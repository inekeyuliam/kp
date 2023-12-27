@extends('layouts.admin_layout')

@section('title','Daftar Buku Peminjaman')

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
            <a class="navbar-brand" href="javascript:;"> SMP KEMALA BHAYANGKARI 9 WARU </a>
          </div>
@endsection
@section('content')


  <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar Peminjaman</h4>
                </div>
                <div class="card-body">
                <form action="/peminjaman/search"class="navbar-form">
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Cari Berdasarkan Kode Transaksi Peminjaman..." name="search">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
                </div>
              </form>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          No.
                        </th>
                        <th>
                          Kode Transaksi 
                        </th>
                        <th>
                          Tgl Peminjaman
                        </th>
                        <th>
                          Tgl Batas Pengembalian
                        </th>
                        <th>
                          Terlambat
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Action Status
                        </th>
                      </thead>
                      <tbody>
                        @foreach($listtransaksi as $key=>$item)
                        <tr>
                          <td>
                            {{$key+1}}
                          </td>
                          <td><a href="{{url('pinjam/'.$item->id)}}">
                              {{$item->kode_transaksi}}
                              </a>
                          </td>
                          <td>
                          {{date('d/m/y', strtotime($item->tgl_pinjam))}}
                          </td>
                          <td>
                          {{date('d/m/y', strtotime($item->tgl_batas))}}
                          </td>
                          <td>
                          {{$item->terlambat}} Hari
                        
                          </td>

                          <td>
                          @if($item->status == 'pinjam')
                          <a class="badge badge-pill badge-info"> {{$item->status}}</a>
                          @else
                          <a class="badge badge-pill badge-warning"> {{$item->status}}</a>
                          @endif
                          </td>

                          <td>
                          @if($item->status == 'kembali')
                          -
                          @else
                          <a href="{{url('pinjam/'.$item->id.'/edit')}}" class="btn btn-success btn-sm">update</a>
                          <!-- <a href="/transaksi/update/{{$item->id}}" class="btn btn-success btn-sm">update</a>  -->
                         
                          @endif
                          </td> 
                       
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                   <a href="{{url('pinjam/create')}}" class="btn btn-primary btn-round">Tambah</a>
                </div>

              </div>

            </div>
          
          </div>
        

        </div>
        
  </form>
@endsection