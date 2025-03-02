@extends('layouts.main')

@push('scripts')
    <script src="{{ asset('js/college.js') }}"></script>
@endpush

@section('content')
    <main class="py-4 bg-dark">
        <div class="container">
            @if($message = session('message'))
                <div class="alert alert-success" id="msg" style="transition: opacity 0.5s ease-out;">
                    {{$message}}
                </div>
            @endif
            @if($message = session('alert'))
                <div class="alert alert-warning" id="alert" style="transition: opacity 0.5s ease-out;">
                    {{$message}}
                </div>
            @endif
            @if($message = session('danger'))
                <div class="alert alert-danger" id="danger" style="transition: opacity 0.5s ease-out;">
                    {{$message}}
                </div>
            @endif
            <div class="row">
                <!-- TO CHANGE!!!! -->
                <div class="add-button">
                    <a href="{{route('colleges.create')}}">
                        <span class="add-icon">
                            +
                        </span>
                        <span class="add-text">Add College</span>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-left: 2px;">
                        <h3>Colleges</h3>
                        <h4 class="mt-1" style="margin-left: 10px; color:rgb(144, 152, 160);"> ({{ $colleges->count() }})
                        </h4>
                    </div>
                    <div class="card text-white mt-3" style="background-color: #007bff;">
                        <table class="table table-dark table-hover" id="collegesTable">
                            <thead>
                                <tr>
                                    <th scope="col">CollegeID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($colleges as $index => $college)
                                    <tr onclick="window.location='{{ route('colleges.view', $college->id) }}'"
                                        style="cursor: pointer;">
                                        <th scope="row">{{$college->id}}</th>
                                        <td>{{ $college->name }}</td>
                                        <td>{{ $college->address }}</td>
                                        <td width="150">
                                            <a href="{{ route('colleges.edit', $college->id) }}"
                                                class="btn btn-sm btn-circle btn-outline-light" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('colleges.destroy', $college->id) }}"
                                                class="btn btn-sm btn-circle btn-outline-danger" title="Delete"
                                                id="btn-delete"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                <form id="delete-college-form" method="POST" style="display: none;">
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