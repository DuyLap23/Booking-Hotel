<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\MarketingBanner;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $amenity = Amenity::limit(4)->get();
        $banners = MarketingBanner::all();
        $amenities = Amenity::all();
        $services = Service::all();
        $RoomTypes = RoomType::all();
   

        return view('client.home',compact('amenity','amenities','banners','services','RoomTypes'));
    }

}
