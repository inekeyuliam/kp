@extends('layouts.admin_layout')

@section('title','Detail Anggota')

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
          <li class="nav-item active ">
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
                  <h4 class="card-title">Detail Peminjaman</h4>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">PERPUSTAKAAN SMP KEMALA BHAYANGKARI 9 WARU</label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Transaksi</label>
                          <input type="text" class="form-control" name="kode_transaksi" value="{{ $detilpinjam->kode_transaksi }}" readonly='true'>
                        </div>
                       </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Peminjaman</label>
                          <input type="date" class="form-control" name="tgl_pinjam" value="{{$detilpinjam->tgl_pinjam}}" readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Anggota</label>
                          <input type="text" class="form-control" name="nama" value="{{$detilpinjam->kode_anggota}}"  readonly="true">
                        </div>
                      </div>
                 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" value="{{$detilpinjam->nama}}"  readonly="true">
                        </div>
                      </div>
                   
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Induk</label>
                          <input type="text" class="form-control" name="nomor_induk" value="{{$detilpinjam->no_induk}}"  readonly="true">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating" >Kelas </label>
                          <input type="text" class="form-control" name="kelas" value="{{$detilpinjam->kelas}}"  readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Telp.</label>
                          <input type="text" class="form-control" name="telepon" value="{{$detilpinjam->telepon}}"  readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat" value="{{$detilpinjam->alamat}}"  readonly="true">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email </label>
                          <input type="email" class="form-control" name="email" value="{{$detilpinjam->email}}"  readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Buku</label>
                          <input type="text" class="form-control" value="{{$detilpinjam->kode_buku}}"  readonly="true">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Judul Buku</label>
                          <input type="text" class="form-control" name="judul" value="{{$detilpinjam->judul}}" readonly="true">
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kategori</label>
                          <input type="text" class="form-control" name="kategori" value="{{$detilpinjam->nama_kategori}}"  readonly="true">
                        </div>
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>BATAS PENGEMBALIAN BUKU</b></label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Batas tanggal Pengembalian</label>
                          <input type="date" class="form-control" name="tgl_batas" value="{{$detilpinjam->tgl_batas}}" readonly="true">
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>TANGGAL PENGEMBALIAN BUKU</b></label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Tanggal Pengembalian</label>
                          @if($detilpinjam->status == 'kembali')
                          <input type="date" class="form-control" name="tgl_batas" value="{{$detilpinjam->tgl_kembali}}" readonly="true">
                          @else
                          <input type="text" class="form-control" name="tgl_batas" value="belum dikembalikan" readonly="true">
                          @endif
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>LAMA KETERLAMBATAN</b></label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Terlambat Pengembalian</label>
                          @if($detilpinjam->status == 'kembali')
                          <input type="text" class="form-control" name="keterlambatan" value="{{$detilpinjam->terlambat}} Hari" readonly="true">
                          @else
                          <input type="text" class="form-control" name="keterlambatan" value="0 Hari" readonly="true">
                          @endif
                        </div>
                      </div>
                    </div> 
                    <a href="{{url('pinjam/')}}"><span class="material-icons">keyboard_backspace</span> Kembali</a> 

                </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
       
  </form>
@endsection