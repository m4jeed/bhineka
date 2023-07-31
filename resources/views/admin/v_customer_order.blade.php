@extends('admin.main')

@section('container')
{{-- @role('SUPERADMIN') --}}
<section class="row">
    {{-- buat pencarianan --}}
    {{-- <div class="col-md-6">
        <div class="text-left mt-auto col-sm-8 col-md-6">
          <form action="" method="get">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="No. Faktur">
                <button type="submit" class="input-group-text">Search</button>
            </div>
          </form>
        </div>
      </div> --}}
        <div class="card">
            <div class="card-body">
                
                <table id="row-select" class="display table table-borderd">
                  <thead>
                    @foreach ($invoice as $row)
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <div><strong>PT. BHINEKA SANGKURIANG TRANSPORT</strong> <br>Jl. Gedebage Selatan No. 121A, Cisaranten Kidul, Kec.Gedebage, 
                            Kota Bandung, Jawa Barat 40552</div>
                        </div>
                        <div class="col-md-6">
                            
                            <div>Kepada Yth : <br><strong>{{ isset($res) ? $res->perusahaan_name: '' }}</strong> 
                                <br>{{ $res->alamat }} <br> Up : {{ isset($res) ? $res->name: '' }}</div>
                        </div>
                    </div>
                    {{-- kalo ada pencarian di buka --}}
                    {{-- @if ($keyword == '')
                    <td>No. Faktur :</td>
                    @else
                    <td>No. Faktur : {{ isset($row) ? $row->invoice_number: '' }}</td>
                    @endif --}}
                    <td>No. Faktur : {{ isset($row) ? $row->invoice_number: '' }}</td>
                    <tr style="background-color: #D8D9DA">
                      <th style="font-weight: bold">Kode</th>
                      <th>Nama</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Harga Total</th>
                    </tr>
                  </thead>
                  <tbody>
                        @php
                            $hitungJumlah = 0;
                            $hitungHarga = 0;
                            $hitungTotal = 0;
                        @endphp
                    @foreach ($invoice as $row)
                        @if (!$row->isEmpty)
                        <tr>
                            <td>{{ $row->code }}</td>
                            <td> {{  $row->transaction_name }}</td>
                            <td>{{ $row->satuan }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>{{ number_format($row->harga) }} </td>
                            <td>{{ number_format($row->total_harga) }}</td>
                        </tr>
                        @endif
                        @php
                            $hitungJumlah += $row->jumlah;
                            $hitungHarga += $row->harga;
                            $hitungTotal += $row->total_harga;
                        @endphp
                    @endforeach
                    <tr>
                        <td></td>
                        <td><strong>TOTAL</strong></td>
                        <td></td>
                        <td><strong>{{ $hitungJumlah }}</strong></td>
                        <td><strong>{{ number_format($hitungHarga) }}</strong></td>
                        <td><strong>{{ number_format($hitungTotal) }}</strong></td>
                    </tr>
                    
                  </tbody>
                </table>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="text-center" style="padding-right: 300px">Purchasing</div><br><br>
                        <div class="text-center" style="padding-right: 300px">Ilham</div>
                    </div>
                    <div class="col-md-6">
                        @php
                        $custom_date = '04 Juli 2023';
                        // setlocale(LC_TIME, 'id_ID.utf8');
                        $timestamp = strtotime($custom_date);
                        $tgl = date('d F Y', $timestamp);
                        // echo $tgl; 
                        @endphp
                        {{-- <div class="text-center" style="padding-left: 220px">Cirebon, <?php //echo date("d-m-y");?></div><br><br> --}}
                        <div class="text-center" style="padding-left: 220px">Cirebon, <?php echo $tgl; ?></div><br><br>
                        <div class="text-center" style="padding-left: 220px">{{ isset($res) ? $res->name: '' }}</div>
                    </div>
                </div>
            </div>
            
            
        </div>
</section>

{{-- @endrole --}}
@endsection
