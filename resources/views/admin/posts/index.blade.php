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
        <table class="table table-hover align-middle border">
            <thead>
                <tr>
                    <th class="admin-table-header"></th>
                    <th class="admin-table-header text-center">Name</th>
                    <th class="admin-table-header text-center">Title</th>
                    <th class="admin-table-header text-center">VisteDate</th>
                    <th class="admin-table-header text-center">Create</th>
                    <th class="admin-table-header text-center">Update</th>
                    <th class="admin-table-header"></th> 
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><img src="https://images.pexels.com/photos/402028/pexels-photo-402028.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="admin-img"></td>
                    <td>Michel</td>
                    <td>beatiful views</td>
                    <td>2000/01/01</td>
                    <td>2024-07-22</td>
                    <td>2024-07-22</td>
                    <td><i class="fa-solid fa-ellipsis"></i></td>
                </tr>

                <tr>
                    <td><img src="https://images.pexels.com/photos/1798631/pexels-photo-1798631.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="admin-img"></td>
                    <td>Jack</td>
                    <td>Please check here</td>
                    <td>2000/01/01</td>
                    <td>2024-07-22</td>
                    <td>2024-07-22</td>
                    <td><i class="fa-solid fa-ellipsis"></i></td>
                </tr>

                <tr>
                    <td><img src="https://images.pexels.com/photos/1023953/pexels-photo-1023953.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="admin-img"></td>
                    <td>Maria</td>
                    <td>Japan</td>
                    <td>2000/01/01</td>
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