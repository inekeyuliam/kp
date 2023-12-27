@extends('layouts.admin_layout')

@section('title','Daftar Anggota Perpustakaan')

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


  <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar Anggota</h4>
                </div>
                <div class="card-body">
                <form action="/anggota/search"class="navbar-form" method='GET'>
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder="Cari Berdasarkan Nama atau Kode Anggota.." name="search">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                  </button>
            
                </div>
               
              </form>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <!-- <th>
                          No
                        </th> -->
                        <th>
                          Kode Anggota
                        </th>
                        <th>
                          No Induk
                        </th>
                        <th>
                          Nama Lengkap
                        </th>
                         <th>
                         Kelas
                        </th>
                        <th>
                          Tanggal Daftar
                        </th>
                         <th>
                          Edit
                        </th>
                         <th>
                          Delete
                        </th>
                      </thead>
                      <tbody>
                        @foreach($listanggota as $key=>$item)
                        <tr>
                        
                          <td><a href="{{url('anggota/'.$item->id)}}">
                              {{$item->kode_anggota}}</a>
                          </td>
                          <td>
                              {{$item->no_induk}}
                          </td>
                          <td> 
                              {{$item->nama}}
                          </td>
                         
                          <td >
                              {{$item->kelas}}
                          </td>
                          <td >
                              {{$item->tanggal}}
                          </td>
                          
                         
                          <td>
                          <a href="{{url('anggota/'.$item->id.'/edit')}}"><span class="material-icons">edit</span></a>
                          </td> 
                          <td >
                          <form method="POST" action="{{ url('anggota/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                            {{ method_field("DELETE") }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <a href="#"  onClick="document.getElementById('form-hapus-{{ $item->id }}').submit()"><span class="material-icons">delete</span></a>
                              
                          </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                   <a href="{{url('anggota/create')}}"class="btn btn-primary btn-round">Tambah</a>
                </div>
              </div>
            </div>
          </div>
        </div>

  </form>
 
@endsection