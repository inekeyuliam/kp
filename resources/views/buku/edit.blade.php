@extends('layouts.admin_layout')

@section('title','Edit Buku')

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
          <li class="nav-item active">
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
            <a class="navbar-brand" href="javascript:;">SMP KEMALA BHAYANGKARI 9 WARU</a>
          </div>
@endsection
@section('content')

  <form class="mt-2" action='{{url("buku/".$itembuku->id)}}' method="post">
{{ method_field("PUT")}}
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Data Buku</h4>
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
                          <label class="bmd-label-floating">Kode Buku</label>
                          <input type="text" class="form-control" name="kode_buku" value="{{$itembuku->kode_buku}}" readonly=true>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating">Kategori</label>
                          <select class="form-control" name="kategori">
                            @foreach ($itemkategori as $kat)
                              <option value="{{$kat->id}}" @if($kat->id == $itembuku->kategori_id){
                                {{"selected"}}
                              }
                              @endif>{{$kat->nama_kategori}}</option>
                            @endforeach

                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penerbit </label>
                          <select class="form-control" name="penerbit">
                            @foreach ($itempenerbit as $pen)
                              <option value="{{$pen->id}}" @if($kat->id == $itembuku->penerbit_id){
                                {{"selected"}}
                              }
                              @endif>{{$pen->nama_penerbit}}</option>
                            @endforeach

                          </select>                        
                          </div>
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Judul</label>
                          <input type="text" class="form-control" name="judul" value="{{$itembuku->judul}}">
                        </div>
                      </div>
                    
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Penulis </label>
                          <select class="form-control" name="penulis">
                            @foreach ($itempenulis as $pen)
                              <option value="{{$pen->id}}" @if($kat->id == $itembuku->penulis_id){
                                {{"selected"}}
                              }
                              @endif>{{$pen->nama_penulis}}</option>
                            @endforeach

                          </select>                                    </div>
                    </div>
                    </div>
                       
                    <div class="row">
                       
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">ISBN</label>
                          <input type="text" class="form-control" name="ISBN" value="{{$itembuku->ISBN}}">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tahun Terbit</label>
                          <input type="text" class="form-control" name="tahun_terbit" value="{{$itembuku->tahun_terbit}}">
                        </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">Quantity</label>
                          <input type="number" class="form-control" name="quantity" value="{{$itembuku->quantity}}">
                        </div>
                      </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-round pull-right"><i class="material-icons">check</i> Simpan</button>
                    <a href="{{url('buku/')}}" class ="btn btn-primary btn-round"> <i class="material-icons">cancel</i> Cancel</a>
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