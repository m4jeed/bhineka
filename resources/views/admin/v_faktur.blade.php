@extends('admin.main')

@section('container')
{{-- @role('SUPERADMIN') --}}
<section class="row">
      @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ Session::get('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $page_title }}</h5>
                <div class="row">
                  {{-- <div class="col-md-12"> --}}
                    <div class="col-md-12">
                      <div class="text-end mt-auto">
                        <a href="{{ url('admin/faktur/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" style="margin-right:5px"></i>Tambah</a>
                      </div>
                    </div>
                  {{-- </div> --}}
                </div>
                
            </div>
            
            <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      {{-- <th>Customer</th> --}}
                      <th>No. Faktur</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($res as $row)
                        <tr>
                          {{-- <td>{{ $row->user->name }}</td> --}}
                          <td>{{ $row->invoice_number }}</td>
                          <td>{{ $row->code }}</td>
                          <td>{{ $row->transaction_name }}</td>
                          <td>{{ $row->satuan }}</td>
                          <td>{{ $row->jumlah }}</td>
                          <td>{{ number_format($row->harga) }}</td>
                          <td>{{ number_format($row->total_harga) }}</td>
                          <td>
                              <a class="btn btn-info" href="{{ url('admin/faktur/edit/' . $row->id) }}" 
                                    title="Edit"><i class="fa fa-edit"></i></a>
                            <form action="{{ url('admin/faktur/delete/' . $row->id) }}" method="post" 
                              class="d-inline" onsubmit="return confirm('yakin akan menghapus data?')">
                              @csrf
                              <button class="btn btn-danger"
                            title="Delete"><i class="fa fa-trash"></i></button>
                          </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

        </div>
</section>
{{-- @endrole --}}
@endsection
