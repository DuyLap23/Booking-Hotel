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
                                    <h4>Room add</h4>

                                </div>
                                <div class="QA_table mb_30">

                                    <div class="col-lg-12">
                                        <div class="white_card card_height_100 mb_30">
                                            <div class="white_card_body">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.rooms.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row mb-3">
                                                            <div class="col-md-6 mt-2">
                                                                <label class="form-label" for="inputName">Name</label>
                                                                <input type="text" class="form-control" id="inputName"
                                                                    name="name" value="{{ old('name') }}"
                                                                    placeholder="P302, F101...">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-4 mt-2">
                                                                <label class="form-label" for="image">Image Thumbnail
                                                                </label>
                                                                <input type="file" class="form-control" id="image"
                                                                    name="image" value="{{ old('image') }}">
                                                                @error('image')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12 mt-5">
                                                                    <div class="">
                                                                        <div class="live-preview">
                                                                            <button type="button" class="btn btn-success btn-sm float-end"    
                                                                            onclick="addImageGallery()">Thêm ảnh</button>
                                                                            <div class="row gy-4" id="gallery_list">
                                                                                <div class="col-md-4"
                                                                                    id="gallery_default_item">
                                                                                    <label for="gallery_default"
                                                                                        class="form-label">Image</label>
                                                                                    <div class="d-flex">
                                                                                        <input type="file"
                                                                                            class="form-control"
                                                                                            name="room_images[]"
                                                                                            id="gallery_default">
                                                                                            
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--end row-->
                                                                    </div>
                                                                </div><!--end col-->
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col mt-2">
                                                                <label class="form-label"
                                                                    for="inputNaDescription">Description</label>
                                                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                                            </div>
                                                            @error('description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>


                                                        <div class="col-mb-3">
                                                            <label class="form-label" for="inputRoomType">Room Types</label>
                                                            <select id="inputRoomType" class="form-control"
                                                                name="room_type_id">
                                                                <option selected>Choose...</option>
                                                                @foreach ($roomTypes as $rtype)
                                                                    <option value="{{ $rtype->id }}">{{ $rtype->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('room_type_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="availability_status" name="availability_status"
                                                                    checked value="1">
                                                                <label class="form-label form-check-label"
                                                                    for="availability_status">
                                                                    Availability Status
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="is_active" name="is_active" checked value="1">
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
@section('script-libs')
    <script>
        function addImageGallery() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
        <div class="col-md-4" id="${id}_item">
            <label for="${id}" class="form-label">Image</label>
            <div class="d-flex">
                <input type="file" class="form-control" name="room_images[]" id="${id}">
                <button type="button" class="btn btn-danger" onclick="removeImageGallery('${id}_item')">
                    <span class="bx bx-trash"></span>
                </button>
            </div>
        </div>
    `;

            $('#gallery_list').append(html);
        }

        function removeImageGallery(id) {
            if (confirm('Chắc chắn xóa không?')) {
                $('#' + id).remove();
            }
        }
    </script>
@endsection
