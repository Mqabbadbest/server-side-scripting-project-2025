@extends('layouts.main')
@section('content')
    <main class="py-4 bg-dark">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Edit Student</strong>
                        </div>
                        <div class="card-body rounded">
                            <form action="{{ route('students.update', $student->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @include('students._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection