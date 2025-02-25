@extends('layouts.main')
@section('container')
    <main class="content">
        <section class="main-banner">    
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('images/banner/main-banner.png') }}" class="d-block w-100" alt="Promosi Bulan Ini">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner/main-banner.png') }}" class="d-block w-100" alt="Promosi Bulan Ini">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('images/banner/main-banner.png') }}" class="d-block w-100" alt="Promosi Bulan Ini">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="products">
            <div class="container-xxl">
                <h2>Produk Kami</h2>
                <div class="galleries">
                    @foreach($products as $product)
                        <div class="item">
                            <a href="">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}">
                            </a>
                            <div class="product-name">{{ $product->product_name }}</div>
                            <div class="product-description">
                                {{ $product->product_description }}
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </section>
        <section class="blog">
            <div class="container-xxl">
                <h2>Blog</h2>
                <div class="row" data-masonry='{"percentPosition": true }'>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

                        <div class="card-body">
                        <h5 class="card-title">Card title that wraps to a new line</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card p-3">
                        <figure class="p-3 mb-0">
                        <blockquote class="blockquote">
                            <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                        </figure>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card bg-primary text-white text-center p-3">
                        <figure class="mb-0">
                        <blockquote class="blockquote">
                            <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-white">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                        </figure>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has a regular title and short paragraph of text below it.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <svg class="bd-placeholder-img card-img" width="100%" height="260" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Card image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Card image</text></svg>

                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card p-3 text-end">
                        <figure class="mb-0">
                        <blockquote class="blockquote">
                            <p>A well-known quote, contained in a blockquote element.</p>
                        </blockquote>
                        <figcaption class="blockquote-footer mb-0 text-muted">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </figcaption>
                        </figure>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="order">
            <div class="container">
                <h2>Pesan Sayuran</h2>

                
                <form id="order-form" class="order-form">
                    <p>
                        Silahkan isi form dibawah ini untuk melakukan pemesanan. 
                        Admin kami akan menghubungi Anda untuk konfirmasi pesanan dan pembayaran
                    </p>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">Nomor HP</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="">
                    </div>                  
                    <div class="mb-3">
                        <label for="address">Alamat Pengiriman</label>
                        <textarea name="address" class="form-control" id="address" rows="10"></textarea>
                    </div>                  
                    <div class="mb-3">
                        <label for="order_detail">Sayur yang akan dipesan</label>
                        <textarea name="order_detail" id="order_detail" rows="10"></textarea>
                    </div>                  
                    <div class="mb-3">
                        <input id="submit" type="submit" name="submit" value="Submit">
                    </div> 
                </form>
            </div>
        </section>
    </main>
@endsection