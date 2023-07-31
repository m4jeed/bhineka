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
                        @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <p style="color:red">{{ $error }}</p>
                                @endforeach
                        @endif
                        <form class="form" action="save" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Kode Faktur</label>
                                        <input type="text" id="code" class="form-control"
                                            placeholder="isi data" name="code" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">No. Faktur</label>
                                        <input type="text" id="invoice_number" class="form-control"
                                            placeholder="isi data" name="invoice_number" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Nama Faktur</label>
                                        <input type="text" id="transaction_name" class="form-control" placeholder="isi data"
                                            name="transaction_name" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Satuan</label>
                                        <input type="text" id="satuan" class="form-control"
                                            name="satuan" placeholder="isi data" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" id="jumlah" class="form-control" name="jumlah"
                                            placeholder="isi data" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" id="harga" class="form-control"
                                            name="harga" placeholder="isi data" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div  class="form-group">
                                        <label for="">Customer</label>
                                        <select name="user_id" id="user_id" class="form-select">
                                            @if (isset($res))
                                                <option value="">--Pilih--</option>
                                                @foreach ($user as $row)
                                                    <option value="{{ $row->id }}" {{ $res->user_id == $row->id ? 'selected' : '' }}>
                                                        {{ $row->name }}</option>
                                                @endforeach
                                            @else
                                                <option value="">--Pilih--</option>
                                                @foreach ($user as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Simpan
                                    </button>
                                    <a href="{{ url('admin/faktur') }}" class="btn btn-light-secondary me-1 mb-1">
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
