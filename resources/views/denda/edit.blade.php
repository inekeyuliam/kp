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
<form class="mt-2" action='{{url("denda/".$itemdenda->id)}}' method="post">
    {{ method_field("PUT")}}

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Denda</h4>
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
                         
                          <input type="date" readonly="true" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="{{$itemdenda->tgl_pinjam}}">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Denda</label>
                          <input type="text" class="form-control" name="kode_denda" id="kode_denda" value="{{$itemdenda->kode_denda}}"readonly='true'>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                     
                       <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">ID Detil Transaksi</label>
                          <input type="text" class="form-control" name="detil_transaksi_id" id="detil_transaksi_id" readonly='true' value="{{$itemdenda->detil_transaksi_id}}">
                                                   
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
                        
                          <input type="date" readonly="true" class="form-control" name="tgl_batas" id="tgl_batas" readonly="true" value="{{$itemdenda->tgl_batas}}">
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
                        
                          <input type="date" readonly="true" class="form-control" name="tgl_kembali" id="tgl_kembali" readonly="true" value="{{$itemdenda->tgl_kembali}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating"><b>Jumlah Denda</b></label>
                          <input type="text" class="form-control" readonly="true">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">     
                          <input type="number" readonly="true" class="form-control" name="denda" id="denda" readonly="true" value="{{$itemdenda->denda}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating">Status Pembayaran</label>
                        <select class="form-control" name="status">
                        <option value="lunas"@if($itemdenda->status == 'lunas') selected ='selected' @endif>Lunas</option>
                              <option value="belum"@if($itemdenda->status == 'belum') selected ='selected' @endif>Belum dibayar</option>
               
               
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
       
  </form>
@endsection