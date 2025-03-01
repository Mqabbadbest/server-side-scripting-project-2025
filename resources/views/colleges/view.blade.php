@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card rounded">
                        <div class="card-header card-title rounded">
                            <strong>College Details</strong>
                        </div>
                        <div class="card-body " style="border-radius: 10px;">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label text-muted">Name</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-white">Alfred</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-3 col-form-label text-muted">Address</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">Lorem ipsum dolor</p>
                                        </div>
                                    </div>
                                    <hr style="background-color: #6c757d;">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <a href="#" class="btn btn-info" style="background-color: #007bff;">Edit</a>
                                            <a href="#" class="btn btn-outline-danger">Delete</a>
                                            <a href="index.html" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection