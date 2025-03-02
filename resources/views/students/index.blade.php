@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('js/student.js') }}"></script>
@endpush

@section('content')
    <!-- content -->
    <main class="py-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="add-button">
                    <a href="{{ route('students.create') }}">
                        <span class="add-icon">
                            +
                        </span>
                        <span class="add-text">Add Student</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-left: 2px;">
                        <h3>Students</h3>
                        <h4 class="mt-1" style="margin-left: 10px; color:rgb(144, 152, 160);"> ({{ $students->count() }})
                        </h4>
                    </div>
                    <div class="card bg-dark text-white">
                        <div class="card-body" style="border-radius: 15px">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-1"> Sorting and Filtering</h4>
                            </div>
                            <hr class="bg-light">
                            <div class="row" style="justify-content: space-between;">
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col">
                                            <label for="companyFilter" class="form-label">Sorting by</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select bg-dark text-white">
                                                    <option value="" selected>Sort Options</option>
                                                    <option value="2">Name (A-Z)</option>
                                                    <option value="3">Name (Z-A)</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            <label for="companyFilter" class="form-label">Filter by College</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select bg-dark text-white">
                                                    <option value="" selected>All Companies</option>
                                                    <option value="1">Company One</option>
                                                    <option value="2">Company Two</option>
                                                    <option value="3">Company Three</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-white mt-3" style="background-color: #007bff;">
                        <table class="table table-dark table-hover" id="studentsTable">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50px;">ID</th>
                                    <th scope="col" style="width: 110px;">Name</th>
                                    <th scope="col" style="width: 210px">Email</th>
                                    <th scope="col" style="width: 100px;">Phone</th>
                                    <th scope="col" style="width: 90px;">DOB</th>
                                    <th scope="col" style="width: 210px;">College</th>
                                    <th scope="col" style="text-align: center; width:100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $student)
                                    <tr onclick="window.location = '{{ route('students.view', $student->id)}}'" style="cursor: pointer;">
                                        <th scope="row" style="width: 50px;">{{ $student->id }}</th>
                                        <td style="width: 110px;">{{ $student->name }}</td>
                                        <td style="width: 210px">{{ $student->email }}</td>
                                        <td style="width: 100px;">{{ $student->phone }}</td>
                                        <td style="width: 90px;">{{ $student->dob }}</td>
                                        <td style="width: 210px;">{{ $student->college->name }}</td>
                                        <td style="width:100px;">
                                            <a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-sm btn-circle btn-outline-light" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('students.destroy', $student->id) }}"
                                                class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                                id="btn-delete"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                <form id="delete-student-form" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection