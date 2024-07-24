<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Hotel;
use App\Models\Promotion;
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
        
        $roomTypes = RoomType::query()->latest('id')->get();;
        return view(self::PATH_VIEW . __FUNCTION__, compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {   
        $promotions = Promotion::all();
        $amenities = Amenity::all();
        return view(self::PATH_VIEW . __FUNCTION__,compact('promotions','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                
            'name' => ['required','max:50'],
            'price' => ['required','integer'],
            'description' => ['required', 'min:20'],

        ]); 
        try {
          
            $data = $validated;
            $data['is_active'] = $request->boolean('is_active', false);

            RoomType::query()->create($data);

            return redirect()->route('admin.room_types.index')->with('success', 'Thêm thành công ');
        } catch (\Exception $exception) {
          DB::rollBack();
            return back()->with('error',$exception->getMessage());
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
        $validated = $request->validate([
                
            'name' => ['required','max:50'],
            'price' => ['required','integer'],
            'description' => ['required', 'min:20'],

        ]); 
        try {
            DB::beginTransaction();
            $model = RoomType::query()->findOrFail($id);

            $data = $validated;
            $data['is_active'] = $request->boolean('is_active', false);
    
            $model->update($data);


            DB::commit();
    
            return redirect()->route('admin.room_types.index')->with('success', 'Cập nhật thành công');

        }catch (\Exception $exception) {    
            
        DB::rollBack();
            return back()->with('error',$exception->getMessage());
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
