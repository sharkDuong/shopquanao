@extends('adminlte::page')

@section('title', 'Admin | Product List')

@section('content_header')
    <h1>Product List</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created By</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration + ($products->currentPage() - 1) * 20 }}.</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->user->name }}</td>
                            <td>
                                <button
                                    class="btn btn-xs btn-danger btn-delete"
                                    data-link="{{ route('admin.products.destroy', $product->id) }}"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $products->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </div>
    </div>

    <form id="form-delete" action="#" method="POST">
        @method('delete')
        @csrf

        <button id="btn-destroy" type="submit" class="btn btn-xs btn-danger" hidden>Delete</button>
    </form>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
        $(function() {
            $('.btn-delete').click(function() {
                var urlDelete = $(this).data('link');

                $('#form-delete').attr('action', urlDelete);

                if (confirm('Are you sure?')) {
                    $('#btn-destroy').click();
                }
            });
        });
    </script>
@stop
