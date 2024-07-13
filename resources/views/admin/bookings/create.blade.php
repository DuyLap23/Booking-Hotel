@extends('admin.layouts.master')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">

                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Booking add</h4>

                                </div>
                                <div class="QA_table mb_30">

                                    <div class="col-lg-12">
                                        <div class="white_card card_height_100 mb_30">
                                            <div class="white_card_body">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.bookings.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf   
                                                        <div class="row mb-3">
                                                           
                                                            <div class="col-md-6 mt-2">
                                                                <label class="form-label" for="checkindate">Check In Date</label>
                                                                <input type="datetime-local" class="form-control" id="checkindate"
                                                                    name="check_in_date" value="{{ old('check_in_date') }}"
                                                                    placeholder="P302, F101...">
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <label class="form-label" for="checkoutdate">Check Out Date</label>
                                                                <input type="datetime-local" class="form-control" id="checkoutdate"
                                                                    name="check_out_date" value="{{ old('check_out_date') }}"
                                                                    placeholder="P302, F101...">
                                                            </div>

                                                        </div>
                                                        <div class="row mb-3">
                                                            
                                                            <div class="col-md-6 mt-2">
                                                                <label class="form-label" for="totalamount">Total Price</label>
                                                                <input type="number" class="form-control" id="totalamount"
                                                                    name="total_amount" value="{{ old('total_amount') }}"
                                                                    placeholder="Enter total">
                                                            </div>

                                                        </div>

                                                        
                                                        <div class="col-mb-3">
                                                            <label class="form-label" for="inputRoomType">Room </label>
                                                            <select id="inputRoomType" class="form-control" name="room_id"    >
                                                                <option selected>Choose...</option>
                                                                @foreach ($rooms as $room)
                                                                    <option value="{{ $room->id }}">{{ $room->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-mb-3">
                                                            <label class="form-label" for="inputRoomType">Customer</label>
                                                            <select id="inputRoomType" class="form-control" name="customer_id"    >
                                                                <option selected>Choose...</option>
                                                                @foreach ($customers as $customer)
                                                                    <option value="{{ $customer->id }}">{{ $customer->first_name }}
                                                                        {{ $customer->last_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        {{-- <div>
                                                            
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="status" name="status" checked value="1">
                                                                <label class="form-label form-check-label" for="status">
                                                                    Status
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
