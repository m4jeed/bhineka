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
                        <form class="form" action="{{ url('/admin/faktur/update-faktur') }}/{{ $res->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Kode Faktur</label>
                                        <input type="hidden" id="id" class="form-control" value="{{ isset($res) ? $res->id : '' }}">
                                        <input type="text" id="code" class="form-control" name="code" value="{{ isset($res) ? $res->code: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">No. Faktur</label>
                                        <input type="text" id="invoice_number" class="form-control" name="invoice_number" 
                                        value="{{ isset($res) ? $res->invoice_number: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Nama Faktur</label>
                                        <input type="text" id="transaction_name" class="form-control" name="transaction_name" 
                                        value="{{ isset($res) ? $res->transaction_name: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Satuan</label>
                                        <input type="text" id="satuan" class="form-control" name="satuan" 
                                        value="{{ isset($res) ? $res->satuan: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="text" id="jumlah" class="form-control" name="jumlah" 
                                        value="{{ isset($res) ? $res->jumlah: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" id="harga" class="form-control" name="harga" 
                                        value="{{ isset($res) ? $res->harga: '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div  class="form-group">
                                        <label for="">Customer</label>
                                        {{-- <input type="text" value="{{ $user->name }}"> --}}
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
                                        Update
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
