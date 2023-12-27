@extends('layouts.admin_layout')

@section('title','Edit Data Anggota')

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
          <li class="nav-item active ">
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
  <H1 class="navbar-brand" align="center">SMP KEMALA BHAYANGKARI 9 WARU</H1>
          </div>
@endsection
@section('content')

  <form class="mt-2" action='{{url("anggota/".$itemanggota->id)}}' method="post">
    {{ method_field("PUT")}}

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Siswa</h4>
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
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Anggota</label>
                          <input type="text" class="form-control" name="kode_anggota" value="{{ $itemanggota->kode_anggota }}" readonly='true'>
                        </div>
                       </div>
                            
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Induk</label>
                          <input type="text" class="form-control" name="nomor_induk" value="{{$itemanggota->no_induk}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal Pendaftaran</label>
                          <input type="date" class="form-control" name="tanggal" value="{{$itemanggota->tanggal}}" readonly="true">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" value="{{$itemanggota->nama}}">
                        </div>
                      </div>
                      
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email </label>
                          <input type="email" class="form-control" name="email" value="{{$itemanggota->email}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat"value="{{$itemanggota->alamat}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Telp.</label>
                          <input type="text" class="form-control" name="telepon" value="{{$itemanggota->telepon}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label>
                          
                           <select class="form-control" name="jenis_kelamin">
                              <option value="laki-laki"@if($itemanggota->jenis_kelamin == 'laki-laki') selected ='selected' @endif>Laki-laki</option>
                              <option value="perempuan"@if($itemanggota->jenis_kelamin == 'perempuan') selected ='selected' @endif>Perempuan</option>
               
                          </select>
                     
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kelas </label>
                          
                           <select class="form-control"  name="kelas">
                              <option value="vii"@if($itemanggota->kelas == 'VII') selected ='selected' @endif>VII</option>
                              <option value="viii"@if($itemanggota->kelas == 'VIII') selected ='selected' @endif>VIII</option>
                              <option value="ix"@if($itemanggota->kelas == 'IX') selected ='selected' @endif>IX</option>
                          </select>

                        </div>
                      </div>
                     
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-round pull-right"><i class="material-icons">check</i> Simpan</button>
                    <a href="{{url('anggota/')}}" class ="btn btn-primary btn-round"> <i class="material-icons">cancel</i> Cancel</a>

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