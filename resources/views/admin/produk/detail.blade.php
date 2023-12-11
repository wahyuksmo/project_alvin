@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Product </h4>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="<?= asset('storage/' . $product->image) ?>" alt="Card image cap"/>
                    <div class="card-body">
                        <h4 class="card-title"><?= $product->title ?></h4>
                        <p class="card-text">
                            <?= $product->body ?>
                        </p>
                        <p>Price : Rp . <?= number_format($product->price) ?></p>
                        <span class="text-muted">Category : <?= $product->category->title ?></span>

                        <a href=" {{ url('') }}/product " class="d-block mt-4"> << Back to home </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection