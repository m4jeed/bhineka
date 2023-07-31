@extends('admin.main')

@section('container')
    {{-- @role('SUPERADMIN') --}}
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $page_title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="save" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="isi data" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" id="email" class="form-control"
                                            placeholder="isi data" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Nama Perusahaan</label>
                                        <input type="text" id="perusahaan_name" class="form-control" placeholder="isi data"
                                            name="perusahaan_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" id="alamat" class="form-control"
                                            name="alamat" placeholder="isi data" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" id="password" class="form-control" name="password"
                                            placeholder="isi data">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Simpan
                                    </button>
                                    <a href="{{ url('admin/customer') }}" class="btn btn-light-secondary me-1 mb-1">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @endrole --}}
@endsection
