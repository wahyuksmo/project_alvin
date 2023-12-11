@extends('admin.layouts.main')
@section('container')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Category</h4>
            <a href="/category/add_category" class="btn btn-sm btn-primary mt-4"><i class="bi bi-plus-circle"></i> Add Kategori</a>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->slug }} </td>
                                    <td>
                                        <a href="/category/edit_category/{{ $item->id }}" class="btn btn-sm btn-success">Edit</a>
                                        <form action="/category/delete_category" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="id" value=" {{ $item->id }} ">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ? ')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
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