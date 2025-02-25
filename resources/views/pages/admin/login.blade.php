@extends('layouts.main')
@section('container')
    <main class="content">
        <section class="login-container">
            <div class="mb-3">
                <div class="logo text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="login">
                <form id="login-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <button id="submit" class="button-green">Submit</button>
                </form>
            </div>
        </section>   
    </main>
@endsection