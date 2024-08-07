@extends('layouts.app')



@section('content')

    <!-- Include the modal here-->
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            @include('components.admin-sidebar')

            <div class="col-8">
                <table class="table table-hover align-middle border text-center">
                    <thead>
                        <tr class="admin-table-header">
                            <th></th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>VisteDate</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><img src="{{ asset('images/sample1.jpg')}}"
                                    alt="" class="admin-img"></td>
                            <td>Michel</td>
                            <td>beatiful views</td>
                            <td>2000/01/01</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td><i class="fa-solid fa-ellipsis"></i></td>
                        </tr>

                        <tr>
                            <td><img src="{{ asset('images/sample2.jpg')}}"
                                    alt="" class="admin-img"></td>
                            <td>Jack</td>
                            <td>Please check here</td>
                            <td>2000/01/01</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td><i class="fa-solid fa-ellipsis"></i></td>
                        </tr>

                        <tr>
                            <td><img src="{{ asset('images/sample3.jpg')}}"
                                    alt="" class="admin-img"></td>
                            <td>Maria</td>
                            <td>Japan</td>
                            <td>2000/01/01</td>
                            <td>2024-07-22</td>
                            <td>2024-07-22</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>

                                    <div class="dropdown-menu text-center">
                                        <button class="dropdown-list" data-bs-toggle="modal"
                                            data-bs-target="#deletePostModal">
                                            Delete Post
                                        </button>
                                    </div>
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
        @include('components.delete-post-modal')

    @endsection
