@extends('admin.layouts.master')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Amenity Update</h4>
                                </div>
                                <div class="QA_table mb_30">
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="white_card card_height_100 mb_30">
                                            <div class="white_card_body">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.banners.update', $banners->id) }}" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div class="row mb-3">
                                                            <div class="col-md-8 mt-2">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="inputName">Title</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputName" name="title"
                                                                        value="{{ $banners->title }}" placeholder="">
                                                                    @error('title')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3"> <label class="form-label"
                                                                        for="inputNaDescription">Description</label>
                                                                    <textarea name="description" class="form-control">{{ $banners->description }}</textarea>
                                                                    @error('description')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mt-2">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="image_url">Image
                                                                    </label>
                                                                    <input type="file" class="form-control"
                                                                        id="image_url" name="image_url"
                                                                        value="{{ old('image_url') }}">
                                                                        @php
                                                                    $images = $banners->image_url;

                                                                    if (!\Str::contains($images, 'http')) {
                                                                        $images = Storage::url($images);
                                                                    }
                                                                @endphp
                                                                <img src="{{ $images }}" width="100"
                                                                    class="img-fluid rounded-3 mt-1" class="mt-3">
                                                                    @error('image_url')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="url">Url
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="url" name="url"
                                                                        value="{{ $banners->url}}">
                                                                    @error('url')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
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
@endsection
