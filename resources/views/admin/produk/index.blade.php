@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Products</h4>
        </div>
        <div class="card-body">
            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($products as $row) : $no++; ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->title ?></td>
                                        <td>Rp. <?= number_format($row->price) ?></td>
                                        <td>
                                            <a href="/product/<?= $row->slug ?>" class="badge bg-primary text-white"> <i class="bi bi-eye"></i></a>
                                            <a href="/product/<?= $row->slug ?>" class="badge bg-success text-white"> <i class="bi bi-pencil"></i></a>

                                            <form action="/product/<?= $row->slug ?>" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="badge bg-danger text-white"><i class="bi bi-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->
        </div>
    </div>
</section>


@endsection