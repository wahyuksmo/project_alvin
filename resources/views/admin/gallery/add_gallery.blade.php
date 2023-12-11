@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Gallery Photos</h4>
        </div>
        <div class="card-body">
            <!-- // Basic multiple Column Form section start -->

            @if (\Session::has('error'))
            <div class="alert alert-light-danger alert-dismissible show fade">
                <i class="bi bi-exclamation-circle"></i>
                {{!! \Session::get('error')  !!}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="form_gallery" method="POST" action="/gallery/store_gallery" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <select class="choices form-select" id="name" name="name">
                                                        <optgroup label="Categories">
                                                        <option value="TRUCK"> Truck</option>
                                                        <option value="KAPAL"> Kapal</option>
                                                        <option value="ESKAVATOR"> Eskavator</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-5">
                                                <label class="mb-3">Upload Photos <span class="text-danger">*</span></label>
                                                <input type="file" name="gallery_images" id="image" class="form-control rounded-pill @error('gallery_images') is-invalid @enderror" onchange="previewImg()">
                                                <div class="col-sm-2 mt-4">
                                                    <img src="/img/default.png" class="img-preview img-thumbnail mb-3 ms-3">
                                                </div>
                                                @error('gallery_images')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">

                                                <button id="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic multiple Column Form section end -->
        </div>
    </div>
</section>

@endsection