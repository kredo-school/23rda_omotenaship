@extends('layouts.app')



@section('content')
    <!-- Include the modal here-->
    @include('components.navbar')
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <div class="list-group  admin-list-group">
                    <h6>Admin page</h6>
                    <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-users"></i> Users</a>
                    <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-pen-to-square"></i>
                        Posts</a>
                    <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-square-xmark"></i> NG
                        words</a>
                </div>
            </div>

            <div class="col-8">
                <table class="table table-hover align-middle border text-center">
                    <thead>
                        <tr class="admin-table-header">
                            <th></th>
                            <th>Name</th>
                            <th>BirthDate</th>
                            <th>Language</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><i class="fa-solid fa-circle-user icon-sm"></i></td>
                            <td>Michel</td>
                            <td>2000/01/01</td>
                            <td>English</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td><i class="fa-solid fa-ellipsis"></i></td>
                        </tr>

                        <tr>
                            <td><i class="fa-solid fa-circle-user icon-sm"></i></td>
                            <td>Michel</td>
                            <td>2000/01/01</td>
                            <td>English</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td><i class="fa-solid fa-ellipsis"></i></td>
                        </tr>

                        <tr>
                            <td><i class="fa-solid fa-circle-user icon-sm"></i></td>
                            <td>Michel</td>
                            <td>2000/01/01</td>
                            <td>English</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    <div class="dropdown-menu text-center">
                                        <button class="dropdown-list" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal">
                                            Delete User
                                        </button>
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Include the modal here-->
    @include('components.footer')

    <!-- Include the modal here-->
    @include('components.delete-modal')
@endsection
