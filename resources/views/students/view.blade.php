@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card rounded">
                        <div class="card-header card-title rounded">
                            <strong>Student Details</strong>
                        </div>
                        <div class="card-body " style="border-radius: 10px;">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label text-muted">Name</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-white">{{ $student->name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label text-muted">Email</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">{{ $student->email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-3 col-form-label text-muted">Phone</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">{{ $student->name }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="col-md-3 col-form-label text-muted">DOB</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">{{ $student->dob }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="college_id" class="col-md-3 col-form-label text-muted">College</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext  text-white">{{ $student->college->name }}</p>
                                        </div>
                                    </div>
                                    <hr style="background-color: #6c757d;">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info"
                                                style="background-color: #007bff;">Edit</a>
                                            <a href="{{ route('students.destroy', $student->id) }}"
                                                class="btn btn-outline-danger" id="btn-delete">Delete</a>
                                            <a onclick="window.history.back()" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                        <form id="delete-student-form" method="POST" style="display: none;">
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