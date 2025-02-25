@extends('layouts.main')
@section('container')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-uppercase">{{  $page_title }}</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-end">
                    <a href="{{ url($current_page. '/create') }}" class="btn btn-primary">Add New Product</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if(session('message'))
                        <div class="alert alert-info mb-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->product_name }}</td>
                                        <td>
                                            <a href="{{ url($current_page.'/edit/' .$dt->id) }}" class="btn btn-outline-success">Edit</a>
                                            <a href="{{ url($current_page.'/delete/' .$dt->id) }}" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </main>
@endsection