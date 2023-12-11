@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Banner</h4>
            <a href="/banner/add_banner" class="btn btn-sm btn-primary mt-4"><i class="bi bi-plus-circle"></i> Add Banner</a>
        </div>
        <div class="card-body">
            <!-- Basic Tables start -->


            <?php if (session()->has('success')) :  ?>
                <div class="alert alert-light-success alert-dismissible show fade">
                    <i class="bi bi-check-circle"></i>
                    <?= session()->get('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($data as $row) :  $no++ ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->title ?></td>
                                        <td>
                                            <a href="/banner/edit_banner/<?= $row->id ?>" class="btn btn-sm btn-success">Edit</a>
                                            <form action="/banner/delete_banner" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ? ')">Delete</button>
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