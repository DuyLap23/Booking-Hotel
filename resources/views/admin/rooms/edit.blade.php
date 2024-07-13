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
                                    <h4>Room Update</h4>

                                </div>
                                <div class="QA_table mb_30">

                                    <div class="col-lg-12">
                                        <div class="white_card card_height_100 mb_30">
                                            <div class="white_card_body">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.rooms.update', $data->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 mt-2">
                                                                <label class="form-label" for="inputName">Name</label>
                                                                <input type="text" class="form-control" id="inputName"
                                                                    name="name" value="{{ $data->name }}"
                                                                    placeholder="P302, F101...">
                                                            </div>

                                                            <div class="col-md-4 mt-2">
                                                                <label class="form-label" for="image">Image </label>
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image">
                                                                @php
                                                                    $url = $data->image;

                                                                    if (!\Str::contains($url, 'http')) {
                                                                        $url = Storage::url($url);
                                                                    }
                                                                @endphp
                                                                <img src="{{ $url }}" width="100"
                                                                    class="mt-3">
                                                            </div>
                                                            <div class="col-md-3 mt-2">
                                                                <label class="form-label"
                                                                    for="inputDescription">Description</label>
                                                                <textarea name="description" id="inputDescription" cols="130" rows="5"
                                                                    value=""placeholder="">{{ $data->description }}</textarea>
                                                            </div>
                                                        </div>
                
                                                        <div class="col-mb-3">
                                                            <label class="form-label" for="inputRoomType">Room Types</label>
                                                            <select id="inputRoomType" class="form-control"
                                                                name="room_type_id">
                                                                <option selected>Choose...</option>
                                                                @foreach ($room_types as $room_type)
                                                                    <option value="{{ $room_type->id }}"
                                                                        {{ $room_type->id == $data->room_type_id ? 'selected' : '' }}>
                                                                        {{ $room_type->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="availability_status" name="availability_status"
                                                                    {{ $data->availability_status ? 'checked' : '' }}
                                                                    value="1">
                                                                <label class="form-label form-check-label"
                                                                    for="availability_status">
                                                                    Availability Status
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="is_active" name="is_active"
                                                                    {{ $data->is_active ? 'checked' : '' }} value="1">
                                                                <label class="form-label form-check-label" for="is_active">
                                                                    Status
                                                                </label>
                                                            </div>
                                                        </div>
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
