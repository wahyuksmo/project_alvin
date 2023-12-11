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
                                    <form id="form_category" method="POST" action="/category/update_category" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-3">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="name" value="<?= old('name', $data->name) ?>">
                                                </div>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="mb-3">Slug <span class="text-danger">*</span> </label>
                                                    <input type="text" readonly class="form-control @error('slug') is-invalid @enderror " placeholder="Slug" name="slug" id="slug" value="<?= old('slug', $data->slug) ?>">
                                                </div>
                                                @error('slug')
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


<script>
    window.addEventListener("load", async function() {

        $("#name").on("change", async function() {
            let value  = $(this).val() + makeid(4)
            $("#slug").val(createSlug(value))
        })

    })
</script>