@extends('layouts.app')



@section('content')

<style>
    .list-group h6{
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        width: 100px
    }

    .table thead {
        color: #202F55;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <h6>Admin page</h6>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-users"></i> Users</a>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-pen-to-square"></i> Posts</a>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-square-xmark"></i> NG words</a>
            </div>
        </div>


    <div class="col-9">
        <table class="table table-hover align-middle border text-center">
            <thead>
                <tr>
                    <th></th>
                    <th class="admin-table-header">Name</th>
                    <th class="admin-table-header">BirthDate</th>
                    <th class="admin-table-header">Language</th>
                    <th class="admin-table-header">Create</th>
                    <th class="admin-table-header">Update</th>
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
                    <td><i class="fa-solid fa-ellipsis"></i></td>
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
@endsection