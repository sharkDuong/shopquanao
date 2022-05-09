@extends('adminlte::page')

@section('title', 'Admin | Create Product')

@section('content_header')
    <h1>Create Product</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Product</h3>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            @include('admin.products._create_or_update_product_form')

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
