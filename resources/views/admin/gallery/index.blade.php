@extends('admin.layouts.main')
@section('container')
<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">List Gallery</h4>
      <a href="/gallery/add_gallery" class="btn btn-sm btn-primary mt-4"><i class="bi bi-plus-circle"></i> Add
        Photos</a>
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
            <section class="section">
              <div class="row">
                <div class="col-md">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Kategeri foto</h5>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Kapal</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Truck</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Eskavator</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-8">
                              <table class="table" id="data_table">
                                <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($kapal as $kpl)
                                  <tr>
                                    <td><img src="{{ asset('storage/'. $kpl->gallery_images) }}" alt="" width="100">
                                    </td>
                                    <td>
                                      <a href="/gallery/edit_gallery/<?= $kpl->id ?>"
                                        class="btn btn-sm btn-success">Edit</a>
                                      <form action="/gallery/delete_gallery" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="<?= $kpl->id ?>">
                                        <button class="btn btn-sm btn-danger"
                                          onclick="return confirm('Yakin ? ')">Delete</button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <div class="row">
                            <div class="col-md-8">
                              <table class="table" id="data_table">
                                <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($truck as $trck)
                                  <tr>
                                    <td><img src="{{ asset('storage/'. $trck->gallery_images) }}" alt="" width="100"> </td>
                                    <td>
                                      <a href="/gallery/edit_gallery/<?= $trck->id ?>"
                                        class="btn btn-sm btn-success">Edit</a>
                                      <form action="/gallery/delete_gallery" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="<?= $trck->id ?>">
                                        <button class="btn btn-sm btn-danger"
                                          onclick="return confirm('Yakin ? ')">Delete</button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                          <div class="row">
                            <div class="col-md-8">
                              <table class="table" id="data_table">
                                <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($eskavator as $esk)
                                  <tr>
                                    <td><img src="{{ asset('storage/'. $esk->gallery_images) }}" alt="" width="100"> </td>
                                    <td>
                                      <a href="/gallery/edit_gallery/<?= $esk->id ?>"
                                        class="btn btn-sm btn-success">Edit</a>
                                      <form action="/gallery/delete_gallery" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="<?= $esk->id ?>">
                                        <button class="btn btn-sm btn-danger"
                                          onclick="return confirm('Yakin ? ')">Delete</button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </section>

          </div>
        </div>

      </section>
      <!-- Basic Tables end -->
    </div>
  </div>
</section>


@endsection