@extends('layouts.app')



@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            <div class="list-group admin-list-group">
                <h6>Admin page</h6>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-users"></i> Users</a>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-pen-to-square"></i> Posts</a>
                <a class="text-decoration-none text-dark" href="#"><i class="fa-solid fa-square-xmark"></i> NG words</a>
            </div>
        </div>

    <div class="col-9">
    <form action="#" method="post">
        <div class="row gx-2 mb-3">
            <div class="col-5">
                <input type="text" name="" id="" class="form-control" placeholder="Add new NG word" autofocus>
            </div>
            <div class="col-3">
                <button type="submit" class="btn w-100 admin-btn">
                    +Add
                </button>
            </div>
        </div>
    </form>
       
        <table class="table table-hover align-middle border text-center">
            <thead>
                <tr class="admin-table-header">
                    <th>Number</th>
                    <th>NG Word</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th></th> 
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Fuck</td>
                    <td>2024-07-22</td>
                    <td>2024-07-22</td>
                    <td><i class="fa-solid fa-ellipsis"></i></td>
                </tr>

                <tr>
                    <td>2</i></td>
                    <td>broad</td>
                    <td>2024-07-22</td>
                    <td>2024-07-22</td>
                    <td><i class="fa-solid fa-ellipsis"></i></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>stupid</td>
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