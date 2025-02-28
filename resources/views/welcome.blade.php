<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Student and College Management System</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="index.html">
                Student and College Management System
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-toggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Students</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Colleges</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- content -->
    <main class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0"> Students</h2>
                                <div class="ml-auto">
                                    <a href="form.html" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add
                                        New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" style="justify-content: space-between;">
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col">
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
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
                        <table class="table table-dark table-hover" id="contactsTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        First Name </th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Alfred</td>
                                    <td>Kuhlman</td>
                                    <td>alfred@test.com</td>
                                    <td>Company one</td>
                                    <td width="150">
                                        <!-- <a href="show.html" class="btn btn-sm btn-circle btn-outline-info"
                                            title="Show"><i class="fa fa-eye"></i></a> -->
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Frederick</td>
                                    <td>Jerde</td>
                                    <td>frederick@test.com</td>
                                    <td>Company one</td>
                                    <td>
                                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Joannie</td>
                                    <td>McLaughlin</td>
                                    <td>joannie@test.com</td>
                                    <td>Company Two</td>
                                    <td>
                                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Odie</td>
                                    <td>Koss</td>
                                    <td>odie@test.com</td>
                                    <td>Company Two</td>
                                    <td>
                                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                            onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Edna</td>
                                    <td>Ondricka</td>
                                    <td>edna@test.com</td>
                                    <td>Company Three</td>
                                    <td>
                                        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info"
                                            title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="form.html" class="btn btn-sm btn-circle btn-outline-light"
                                            title="Edit"><i class="fa fa-edit"></i></a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>