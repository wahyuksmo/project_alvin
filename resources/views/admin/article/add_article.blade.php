@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Article</h4>
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
                                    <form id="form_banner" method="POST" action="/article/store_article" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-3">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" id="title" value="<?= old('title') ?>">
                                                </div>
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-2">Kategori</label>
                                                    <select class="choices form-select @error('category_slug') is-invalid @enderror" id="category_slug" name="category_slug">
                                                        <optgroup label="Kategori">
                                                            @foreach ($data as $item)
                                                                <option value="{{ $item->slug }}"> {{ $item->name }} </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                @error('category_slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label>Description <span class="text-danger">*</span></label>
                                                <input id="body" type="hidden" name="body">
                                                <trix-editor input="body"></trix-editor>
                                                @error('body')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="mb-3">Upload Article <span class="text-danger">*</span></label>
                                                <input type="file" name="article_images" id="image" class="form-control rounded-pill @error('article_images') is-invalid @enderror" onchange="previewImg()">
                                                <div class="col-sm-2 mt-4">
                                                    <img src="/img/default.png" class="img-preview img-thumbnail mb-3 ms-3">
                                                </div>
                                                @error('article_images')
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