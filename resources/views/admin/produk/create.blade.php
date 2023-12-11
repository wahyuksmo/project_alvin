@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Product</h4>
        </div>
        <div class="card-body">
            <!-- // Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="form_product">
                                        <div class="row">
                                            @csrf
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Title <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Slug <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Slug.." name="slug" id="slug" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Price <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" placeholder="Price.." name="price" id="price" min="1">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Quantity <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" placeholder="Quantity.." name="quantity" id="quantity" min="1">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="category_id"> Categories <span class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <select class="choices form-select" id="category_id" name="category_id">
                                                        <optgroup label="Categories">

                                                            <?php foreach ($category as $row) : ?>
                                                                <option value="<?= $row->id ?>"> <?= $row->title ?></option>
                                                            <?php endforeach; ?>
                                                        </optgroup>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Description <span class="text-danger">*</span></label>
                                                <input id="body" type="hidden" name="body">
                                                <trix-editor input="body"></trix-editor>
                                            </div>

                                            <div class="form-group">
                                                <label>Upload Product <span class="text-danger">*</span></label>
                                                <div class="col-sm-2">
                                                    <img src="/img/default.png" class="img-preview img-thumbnail mb-3 ms-3">
                                                </div>
                                                <input type="file" name="image" id="image" class="form-control rounded-pill" onchange="previewImg()">

                                            </div>

                                            <!-- loading -->
                                            <div class="col-md-6 col-12">
                                                <img src="/assets/images/svg-loaders/audio.svg" class="me-4" style="width: 5rem; display:none;" id="loading-image" />
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

        $("#title").change(async function() {

            let random = (Math.random() + 1).toString(36).substring(9);
            let title = $(this).val() + random;
            let slug = title.toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^\w-]+/g, '');
            $("#slug").val(slug)
        })




        $("#form_product").submit(async function(e) {
            e.preventDefault()

            const payload = new FormData(this)

            Swal.fire({
                text: "Are you sure?",
                icon: 'warning',
                confirmButtonText: 'Add Product',
                reverseButtons: true,
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((e) => {

                if (e.value) {

                    $.ajax({
                        beforeSend: function() {
                            $("#loading-image").css("display", "block")
                        },
                        url: '/product',
                        method: 'POST',
                        data: payload,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                title: "Success add product",
                                icon: "success",
                                focusConfirm: true
                            }).then((e) => {
                                window.location.href = '/product'
                            })
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                let errors = $.parseJSON(response.responseText);
                                $.each(errors, function(key, value) {
                                    if ($.isPlainObject(value)) {
                                        $.each(value, function(key, value) {
                                            $(`<p class="text-danger ms-3" style="font-size: 12px;">${value}</p>`).insertAfter(`#${key}`);
                                        })
                                    }
                                })
                            }
                        },
                        complete: function() {
                            $("#loading-image").css("display", "none")
                        }
                    })

                }

            })
        })

    })
</script>