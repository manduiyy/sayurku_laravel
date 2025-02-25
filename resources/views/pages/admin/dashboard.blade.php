@extends('layouts.main')
@section('container')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-uppercase">{{  $page_title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data_list)
                                @foreach ($data_list as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone_number }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <a href="{{ url('order/detail/'.$data->id) }}" class="btn btn-primary">View Detail</a>
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