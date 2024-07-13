<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
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
    // dd($rooms?->toArray());

        return view(self::PATH_VIEW . __FUNCTION__, compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = DB::table('room_types')
        ->where('is_active', 1)
        ->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['image']);
            $data['availability_status'] ??= 0;
            $data['is_active'] ??= 0;

            if ($request->hasFile('image')) {
                $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
            }
           
            Room::query()->create($data);

            DB::commit();

            return redirect()->route('admin.rooms.index')->with('success', 'Thêm thành công ');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            return back();
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
        $room_types = DB::table('room_types')
        ->where('is_active', 1)
        ->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data','room_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $model = Room::query()->findOrFail($id);

            $data = $request->except('image');
            $data['availability_status'] ??= 0;
            $data['is_active'] ??= 0;
    
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
    
            if ($currentImage && Storage::exists($currentImage)) {
                Storage::delete($currentImage);
            }
            

            DB::commit();
    
            return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật thành công');

        }catch (\Exception $exception) {    
            
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
