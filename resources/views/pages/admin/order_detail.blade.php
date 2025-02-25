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
                 <div class="col-lg-2">
                    <nav class="left-nav">
                        <ul>
                            <li><a href="{{ url('dashboard') }}">View Orders</a></li>
                        </ul>
                    </nav>
                 </div>
                 <div class="col-lg-10">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="{{ $detail->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ $detail->phone_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" value="{{ $detail->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control">"{{ $detail->address }}"</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="order_detail" class="form-label">order Detail</label>
                        <textarea name="order_detail" id="order_detail" class="form-control">"{{ $detail->order_detail }}"</textarea>
                    </div>
                 </div>
            </div>
        </div>  
    </main>
@endsection