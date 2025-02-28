@extends('layouts.main')
@section('content')
    <!-- content -->
    <main class="py-4 bg-dark">
        <div class="container">

            <div class="row">
                <div class="add-book-button">
                    <a href="/colleges/create">
                        <span class="add-icon">
                            +
                        </span>
                        <span class="add-text">Add College</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <h3>Colleges</h3>                    

                    <div class="card bg-dark text-white mt-3">
                        <table class="table table-dark table-hover" id="contactsTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        Title </th>
                                    <!-- <th scope="col">Last Name</th> -->
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr onclick="window.location.href='hello'">
                                    <th scope="row">1</th>
                                    <td>Alfred</td>
                                    <!-- <td>Kuhlman</td> -->
                                    <td>alfred@test.com</td>
                                    <td width="150">
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light" title="Edit"><i
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