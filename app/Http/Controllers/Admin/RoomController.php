<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.rooms.';
    const PATH_UPLOAD = 'rooms';
    public function index()
    {
        $rooms = Room::query()
            ->with(['roomType'])
            ->latest('id')
            ->get();
       

        return view(self::PATH_VIEW . __FUNCTION__, compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = DB::table('room_types')->where('is_active', 1)->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:50'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'min:20'],
        ]);
        $dataRoomImages = $request->file('room_images') ?: [];
        try {
            DB::beginTransaction();
            $data = $validated;
            $data['availability_status'] = $request->boolean('availability_status', false);
            $data['is_active'] = $request->boolean('is_active', false);

            if ($request->hasFile('image')) {
                $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
            }
            $rooms = Room::query()->create($data);
            foreach ($dataRoomImages as $key => $image) {
                RoomImage::query()->create([
                    'room_id' => $rooms->id,
                    'image' => $image->store('rooms'),
                ]);
            }
            // dd();

            DB::commit();

            return redirect()->route('admin.rooms.index')->with('success', 'Thêm thành công ');
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Room::query()->findOrFail($id);
        $room_types = DB::table('room_types')->where('is_active', 1)->get();
     

        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'room_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:50'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'min:20'],
        ]);
        $dataRoomImages = $request->file('room_images') ?: [];
        try {
            DB::beginTransaction();
            $model = Room::query()->findOrFail($id);

            $data = $validated;
            $data['availability_status'] = $request->boolean('availability_status', false);
            $data['is_active'] = $request->boolean('is_active', false);

            if ($request->hasFile('image')) {
                // Lưu ảnh mới và cập nhật đường dẫn vào $data
                $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));

                // Lưu lại đường dẫn ảnh hiện tại để xóa sau khi cập nhật thành công
                $currentImage = $model->image;
            } else {
                // Không có ảnh mới, giữ nguyên ảnh hiện tại
                $currentImage = null;
            }

            $model->update($data);

       
            // Lấy danh sách các ảnh hiện tại của phòng từ cơ sở dữ liệu
            $currentImages = RoomImage::where('room_id', $model->id)->get();
            // dd($currentImages);
            // Lấy danh sách các ảnh được gửi lên trong $dataRoomImages
            $newImages = collect($dataRoomImages)->map(function ($image) {
                return [
                    'image' => $image->store('rooms'),
                ];
            });

            // Xác định các ảnh cũ cần xóa
            $imagesToDelete = $currentImages->reject(function ($currentImage) use ($newImages) {
                // Kiểm tra xem ảnh hiện tại có tồn tại trong danh sách ảnh mới không
                return $newImages->contains('image', $currentImage->image);
            });

            // Xóa các ảnh cũ không còn trong danh sách ảnh mới
            foreach ($imagesToDelete as $imageToDelete) {
                Storage::delete($imageToDelete->image); // Xóa ảnh trong storage
                $imageToDelete->delete(); // Xóa ảnh khỏi cơ sở dữ liệu
            }

            // Thêm các ảnh mới vào cơ sở dữ liệu
            foreach ($newImages as $newImage) {
                RoomImage::create([
                    'room_id' => $model->id,
                    'image' => $newImage['image'],
                ]);
            }

            if ($currentImage && Storage::exists($currentImage)) {
                Storage::delete($currentImage);
            }

            DB::commit();

            return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error('Cập nhật thất bại: ' . $exception->getMessage());
            return back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Room::query()->findOrFail($id);

        $model->delete();

        if ($model->image && Storage::exists($model->image)) {
            Storage::delete($model->image);
        }

        return back()->with('success', 'Xoá thành công');
    }
}
