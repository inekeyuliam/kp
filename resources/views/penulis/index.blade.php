@extends('layouts.admin_layout')

@section('title','Penulis Buku')

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
          <li class="nav-item">
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
          <li class="nav-item active">
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

  <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar Penulis Buku</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      
            
                        <th>
                          Nama Penulis
                        </th>
                        
                        <th>
                          Action Edit
                        </th>
                         <th>
                          Action Delete
                        </th>
                      </thead>
                      <tbody>
                        @foreach($listpenulis as $key=>$item)
                        <tr>
                      
                          
                          <td>
                           {{$item->nama_penulis}}
                          </td>
                          <td>
                          <a href="{{url('penulis/'.$item->id.'/edit')}}"><span class="material-icons">edit</span></a>
                          </td> 
                          <td >
                             <form method="POST" action="{{ url('penulis/'.$item->id) }}" id="form-hapus-{{ $item->id }}">
                            {{ method_field("DELETE") }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" onClick="document.getElementById('form-hapus-{{ $item->id }}').submit()"><span class="material-icons">delete</span></a>
                            </form>
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                        <a href="{{url('penulis/create')}}" class="btn btn-primary btn-round">Tambah</a>
                </div>
              </div>
            </div>
          
          </div>
        </div>

@endsection