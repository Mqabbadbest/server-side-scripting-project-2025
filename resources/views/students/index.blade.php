@extends('layouts.main')
@section('content')
    <!-- content -->
    <main class="py-4 bg-dark">
        <div class="container">

            <div class="row">
                <div class="add-book-button">
                    <a href="/students/create">
                        <span class="add-icon">
                            +
                        </span>
                        <span class="add-text">Add Student</span>
                    </a>
                </div>
                <div class="col-md-12">
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

                    <div class="card bg-dark text-white mt-3">
                        <table class="table table-dark table-hover" id="contactsTable">
                            <thead>
                                <tr>
                                    <th scope="col">StudentID</th>
                                    <th scope="col">
                                        Name </th>
                                    <!-- <th scope="col">Last Name</th> -->
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">College</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr onclick="window.location.href='/students/view'">
                                    <th scope="row">1</th>
                                    <td>Alfred</td>
                                    <!-- <td>Kuhlman</td> -->
                                    <td>alfred@test.com</td>
                                    <td>1234567890</td>
                                    <td>1990-01-02</td>
                                    <td>Company one</td>
                                    <td width="150">
                                        <a href="/students/edit" class="btn btn-sm btn-circle btn-outline-light" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection