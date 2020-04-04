@php
    $title = 'Produk';
@endphp
@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{$title}}</h1>

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


    <div class="row">
        <div class="col">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah {{$title}}</h6>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produk.store') }}" autocomplete="off" enctype="multipart/form-data">
                     @csrf
                        <div class="pl-lg-4">
                        @include('produk.form',['update' => false])
                        </div>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Tambah {{$title}}</button>
                                    <a href="{{ route('produk.index') }}" class="btn btn-secondary"><span class="fa fa-arrow-left"></span> Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
