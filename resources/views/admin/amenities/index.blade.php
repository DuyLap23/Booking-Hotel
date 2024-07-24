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
                                    <h4>Amenities list</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ms-2 ">
                                            <a href="{{ route('admin.amenities.create') }}" data-bs-toggle="modal"
                                                data-bs-target="#addcategory" class="btn_2">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">

                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>

                                                <th scope="col">STT</th>
                                                <th scope="col">ID Amenity</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($amenities as $key => $value)
                                            <tbody>
                                                <tr>
                                                    <td scope="row">
                                                        {{ $key }}
                                                    </td>
                                                    <td>
                                                        amentity_{{$value->id }}
                                                    </td>
                                                    
                                                    <td>{{ $value->name }}</td>

                                                    <td>
                                                        @php
                                                        $url = $value->image;

                                                        if (!\Str::contains($url, 'http')) {
                                                            $url = Storage::url($url);
                                                        }
                                                    @endphp
                                                    <img src="{{ $url }}" width="100"   height="100 " class="img-fluid rounded-3"
                                                        class="mt-3">
                                                    </td>
                                                    <td>
                                                        {{ \Str::limit($value->description , 20) }}
                                                    </td>
                                                    

                                                    <td>
                                                        <div class="d-flex align-items-center list-action">
                                                            <a href="{{ route('admin.amenities.edit', $value->id) }}">
                                                                <i class="btn btn-warning">Edit</i>
                                                            </a>
                                                            <form action="{{ route('admin.amenities.destroy', $value->id) }}" class="d-inline mx-2"
                                                                method="POST" id="delete-form">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        @endforeach
                                    </table>
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
