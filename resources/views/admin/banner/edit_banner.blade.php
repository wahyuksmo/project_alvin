@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Banner</h4>
        </div>
        <div class="card-body">
            <!-- // Basic multiple Column Form section start -->

            <?php if (session()->has('error')) :  ?>
                <div class="alert alert-light-danger alert-dismissible show fade">
                    <i class="bi bi-exclamation-circle"></i>
                    <?= session()->get('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="form_banner" method="POST" action="/banner/update_banner" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-3">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" id="title" value="<?= old('title', $data->title) ?>">
                                                </div>
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-3">Label button <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control @error('banner_label') is-invalid @enderror " placeholder="Label Button" name="banner_label" id="banner_label" value="<?= old('banner_label', $data->banner_label) ?>">
                                                </div>
                                                @error('banner_label')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            
                                            <div class="form-group">
                                                <label class="mb-3">Upload Banner <span class="text-danger">*</span></label>
                                                <input type="hidden" name="old_banner_image" value=" {{ $data->banner_image }}">
                                                <input type="file" name="banner_image" id="image" class="form-control rounded-pill @error('banner_image') is-invalid @enderror" onchange="previewImg()">
                                                <div class="col-sm-2 mt-4">
                                                    <img src="<?= asset('storage/' . $data->banner_image) ?>" class="img-preview img-thumbnail mb-3 ms-3">
                                                </div>
                                                @error('banner_image')
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