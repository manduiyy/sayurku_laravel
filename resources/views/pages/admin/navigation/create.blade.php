@extends('layouts.main')
@section('container')
    <main class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-uppercase">{{  $page_title }}</h2>
                </div>
            </div>
            
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <form id="submitForm" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Navigation Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="public">Public</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="show">Show</option>
                                <option value="hide">Hide</option>
                            </select>
                        </div>
                        
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary submit-data">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </main>
@endsection