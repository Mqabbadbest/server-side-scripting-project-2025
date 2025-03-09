@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('js/college.js') }}"></script>
@endpush

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
                                            <p class="form-control-plaintext text-white">{{$college->name  }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-md-3 col-form-label text-muted">Address</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">{{ $college->address }}</p>
                                        </div>
                                    </div>
                                    <hr style="background-color: #6c757d;">
                                    <div class="col-md-9 offset-md-2" style="margin-left: 18.5%;">
                                        <div class="row justify-content-around">
                                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-info"
                                                style="background-color: #007bff;">Edit</a>
                                            <a href="{{ route('colleges.destroy', $college->id) }}"
                                                class="btn btn-outline-danger" id="btn-delete">Delete</a>
                                            <a onclick="window.history.back()" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                        <form id="delete-college-form" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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