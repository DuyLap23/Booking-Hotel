<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.amenities.';
    const PATH_UPLOAD = 'amenities';
    public function index()
    {
        $amenities = Amenity::query()->latest('id')->get();
        // dd($amenities?->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'min:20'],
        ]);

        try {
            DB::beginTransaction();
            $data = $validated;

            if ($request->hasFile('image')) {
                $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
            }
            Amenity::query()->create($data);

            DB::commit();

            return redirect()->route('admin.amenities.index')->with('success', 'Thêm thành công ');
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
        $data = Amenity::query()->findOrFail($id);
      
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:50'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'min:20'],
        ]);
        
        try {
            DB::beginTransaction();
            $model = Amenity::query()->findOrFail($id);
       
            $data = $validated;
          
            if ($request->hasFile('image')) {
                // Lưu ảnh mới và cập nhật đường dẫn vào $data
                $data['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
            
                // Lưu lại đường dẫn ảnh hiện tại để xóa sau khi cập nhật thành công (nếu cần thiết)
                $oldImage = $model->image;
                
            } else {
                // Không có ảnh mới, giữ nguyên ảnh hiện tại
                $oldImage = null;
            }
            
            $model->update($data);

            if ($oldImage && Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            
            DB::commit();

            return redirect()->route('admin.amenities.index')->with('success', 'Cập nhật thành công');
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
        $model = Amenity::query()->findOrFail($id);

        $model->delete();

        if ($model->image && Storage::exists($model->image)) {
            Storage::delete($model->image);
        }

        return back()->with('success', 'Xoá thành công');
    }
}
