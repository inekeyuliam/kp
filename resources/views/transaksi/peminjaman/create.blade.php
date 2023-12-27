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
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('pinjam')}}">
              <i class="material-icons">receipt_long</i>
              <p>Transaksi Peminjaman</p>
            </a>
          </li>
          <li class="nav-item ">
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

  <form class="mt-2" action='{{url("pinjam")}}' method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Data Peminjaman Buku</h4>
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
                         
                          <input type="date" readonly="true" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Transaksi</label>
                          <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" value="{{ $kode }}" readonly='true'>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Anggota</label>
                          <input type="text" class="form-control" name="idanggota" id="idanggota" data-url="{{ url('/') }}">
                                                   
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID Peminjam</label>
                          <input type="text" class="form-control" name="anggota_id" id="anggota_id" readonly="true" >
                           
                        </div>
                      </div>
                    </div>
               
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Peminjam</label>
                          <input type="text" class="form-control" name="nama" id="nama" readonly="true" >
                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Induk</label>
                          <input type="text" class="form-control" name="no_induk" id="no_induk" readonly="true" >
                         
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Buku</label>
                          <input type="text" class="form-control" name="idbuku" id="idbuku" data-url="{{ url('/') }}">
                                                   
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID Buku</label>
                          <input type="text" class="form-control" name="buku_id" id="buku_id" readonly="true" >
                           
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Judul</label>
                          <input type="text" class="form-control" name="judul" id="judul" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kategori</label>
                          <input type="text" class="form-control" name="kategori" id="kategori" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                        <!-- <label class="bmd-label-floating">Status</label>
                          
                          <select class="form-control" name="status" readonly="true">
                             <i class="fas fa-caret-square-down"></i>
                             <option value="pinjam" selected='selected' >Pinjam</option>
                             <option value="kembali" disabled>Kembali</option>
              
                         </select> -->
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
                        
                          <input type="date" readonly="true" class="form-control" name="tgl_batas" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}">
                        </div>
                      </div>
                      
                    </div>

                    <button type="submit" class="btn btn-primary btn-round pull-right"><i class="material-icons">check</i> Simpan</button>
                    <a href="{{url('pinjam/')}}" class ="btn btn-primary btn-round"> <i class="material-icons">cancel</i> Cancel</a>

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
    
        $('#idanggota').on('change', function(e){
        let idanggota = $('#idanggota').val();
        console.log(idanggota);
        let url = $(this).data('url')+'/transaksi/getAnggota/'+idanggota;
        console.log(url);
        getAnggota(url);
        })

        $('#idbuku').on('change', function(e){
        let idbuku = $('#idbuku').val();
        console.log(idbuku);
        let url = $(this).data('url')+'/transaksi/showBuku/'+idbuku;
        console.log(url);
        getBuku(url);

        })

      });

      function getAnggota(url){
          $.getJSON(url, function(data){
        if(data === false){
          $('#id').val("");
          $('#nama').val("");
          $('#anggota_id').val("");

          }
        else{
          $('#nama').val(data.nama);
          $('#no_induk').val(data.no_induk);
          $('#anggota_id').val(data.id);

          }
        });
      }

      function getBuku(url){
        $.getJSON(url, function(data){
      if(data === false){
        $('#judul').val("");
        $('#kategori').val("");
        $('#buku_id').val("");
        }
      else{
        $('#judul').val(data[0].judul);
        $('#kategori').val(data[0].nama_kategori);
        $('#buku_id').val(data[0].id);

        }
      });


     }
     </script>
</form>
   
@endsection