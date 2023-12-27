@extends('layouts.admin_layout')

@section('title','Tambah Peminjaman')

@section('sidebar')
 <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{url('/')}}/assets/img/sidebar-1.jpg">
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Perpustakaan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="{{ url('home')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="{{ url('anggota')}}">
              <i class="material-icons">person</i>
              <p>Daftar Anggota </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('buku')}}">
              <i class="material-icons">import_contacts</i>
              <p>Daftar Buku</p>
            </a>
          </li>
           <li class="nav-item  ">
            <a class="nav-link" href="{{ url('kategori')}}">
              <i class="material-icons">library_books</i>
              <p>Kategori Buku</p>
            </a>
          </li>
        
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('penerbit')}}">
              <i class="material-icons">library_books</i>
              <p>Penerbit Buku</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('penulis')}}">
              <i class="material-icons">library_books</i>
              <p>Penulis Buku</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('pinjam')}}">
              <i class="material-icons">receipt_long</i>
              <p>Transaksi Peminjaman</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('denda')}}">
              <i class="material-icons">account_balance_wallet</i>
              <p>Denda Pengembalian</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('export_excel/excel')}}">
              <i class="material-icons">description</i>
              <p>Laporan Perpustakaan</p>
            </a>
          </li>
         
         
        </ul>
      </div>
    </div>
@endsection
@section('navbar')
  <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">SMP KEMALA BHAYANGKARI 9 WARU</a>
          </div>
@endsection
@section('content')

  <form class="mt-2" action='{{url("denda")}}' method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Denda Pengembalian Buku</h4>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                         <label class="bmd-label-floating" ><b>TANGGAL PEMINJAMAN</b></label>
                          <input type="text" class="form-control"  readonly="true" >
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                         
                          <input type="date" readonly="true" class="form-control" name="tgl_pinjam" id="tgl_pinjam">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Denda</label>
                          <input type="text" class="form-control" name="kode_denda" id="kode_denda" value="{{ $kode }}" readonly='true'>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Transaksi</label>
                          <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" data-url="{{ url('/') }}">
                                                   
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID Detil Transaksi</label>
                          <input type="text" class="form-control" name="detil_transaksi_id" id="detil_transaksi_id" readonly='true'>
                                                   
                        </div>
                       </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>BATAS TANGGAL PENGEMBALIAN</b></label>
                          <input type="text" class="form-control" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        
                          <input type="date" readonly="true" class="form-control" name="tgl_batas" id="tgl_batas" readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>TANGGAL PENGEMBALIAN</b></label>
                          <input type="text" class="form-control" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        
                          <input type="date" readonly="true" class="form-control" name="tgl_kembali" id="tgl_kembali" readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Denda per Hari (Rp)</b></label>
                          <input type="text" class="form-control" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">     
                          <input type="number" readonly="true" class="form-control" value="1000" readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Lama keterlambatan (hari)</b></label>
                          <input type="text" class="form-control" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">     
                          <input type="number" readonly="true" class="form-control" name="terlambat" id="terlambat" readonly="true">
                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Status Pembayaran</label>
                        <select class="form-control" name="status">
                              <option value=""> Pilih Status Pembayaran </option>

                              <option value="lunas">Lunas</option>
                              <option value="belum">Belum dibayar</option>
               
                          </select>
                      </div>
                      </div>
                      </div>
                    <button type="submit" class="btn btn-primary btn-round pull-right"><i class="material-icons">check</i> Simpan</button>
                    <a href="{{url('denda/')}}" class ="btn btn-primary btn-round"> <i class="material-icons">cancel</i> Cancel</a>

                    <div class="clearfix"></div>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
     <!-- Script -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- jQuery CDN
      <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script> -->

     <script type='text/javascript'>
      $(function(){
    
        $('#kode_transaksi').on('change', function(e){
        let idanggota = $('#kode_transaksi').val();
        console.log(idanggota);
        let url = $(this).data('url')+'/denda/getTransaksi/'+idanggota;
        console.log(url);
        getTransaksi(url);
        })

      

      });

      function getTransaksi(url){
          $.getJSON(url, function(data){
        if(data === false){
          $('#tgl_kembali').val("");
          $('#tgl_pinjam').val("");
          $('#tgl_batas').val("");

          }
        else{
          $('#tgl_batas').val(data.tgl_batas);
          $('#tgl_kembali').val(data.tgl_kembali);
          $('#tgl_pinjam').val(data.tgl_pinjam);
          $('#terlambat').val(data.terlambat);
          $('#detil_transaksi_id').val(data.id);

          }
        });
      }

     </script>
</form>
   
@endsection