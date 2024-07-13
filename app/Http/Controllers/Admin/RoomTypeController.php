<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.room_types.';
    const PATH_UPLOAD = 'room_types';
    public function index()
    {
        
        $roomTypes = RoomType::query()->get();;
        return view(self::PATH_VIEW . __FUNCTION__, compact('roomTypes'));
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
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['is_active'] ??= 0;

            RoomType::query()->create($data);

            DB::commit();

            return redirect()->route('admin.room_types.index')->with('success', 'Thêm thành công ');
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
        $data = RoomType::query()->findOrFail($id);
      
        // $room_type_hotel = $data->hotel()->pluck('id')->toArray();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $model = RoomType::query()->findOrFail($id);

            $data = $request->all();
            $data['is_active'] ??= 0;
    
            $model->update($data);


            DB::commit();
    
            return redirect()->route('admin.room_types.index')->with('success', 'Cập nhật thành công');

        }catch (\Exception $exception) {    

            dd($exception->getMessage());

            return back()->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = RoomType::query()->findOrFail($id);
        
        $model->delete();

        return back()->with('success', 'Xoá thành công');
    }
}
