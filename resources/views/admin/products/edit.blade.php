@extends('adminlte::page')

@section('title', 'Admin | Edit Product')

@section('content_header')
    <h1>Edit Product</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @method('PUT')
            @csrf

            @include('admin.products._create_or_update_product_form')

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
