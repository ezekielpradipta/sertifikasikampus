@php
    $title = 'Produk';
   
@endphp

@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif

@if(session('fail'))
    <div class="alert alert-danger">
        {!! session('fail') !!}
    </div>
@endif

    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('produk.create')}}" class="btn btn-primary float-right">
                    <span class="fa fa-plus"></span> Tambah {{ $title }}
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="dt">
                        <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        </thead>
                </table>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#dt').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{route('admin.produk.data')}}',
            columns:[
            {data:'DT_RowIndex',name:'DT_RowIndex'},
            { data: 'title', name: 'title' },
            { data: 'price', name: 'price' },
            { data: 'stock', name: 'stock' },
            { data: 'description', name: 'description' },
            ]
        });
    });
</script>
@endpush
