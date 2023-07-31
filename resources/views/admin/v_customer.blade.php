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
                <div class="text-end mt-auto">
                  <a href="{{ url('admin/customer/create') }}" class="btn btn-success">
                      <i class="fa fa-plus" style="margin-right:5px"></i>Tambah</a>
              </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Nama Perusahaan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($res as $row)
                        <tr>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->perusahaan_name }}</td>
                          <td>
                                <a class="btn btn-secondary" href="{{ url('admin/customer/detil/' . $row->id) }}" 
                                    title="Detail"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-info" href="{{ url('admin/customer/edit/' . $row->id) }}" 
                                    title="Edit"><i class="fa fa-edit"></i></a>
                                <form action="{{ url('admin/customer/delete-customer/' . $row->id) }}" method="post" 
                                      class="d-inline" onsubmit="return confirm('yakin akan menghapus data?')">
                                      @csrf
                                  <button class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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
