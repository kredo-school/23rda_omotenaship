@extends('layouts.app')



@section('content')

@include('components.navbar')

<div class="container mt-5">
    <div class="row">
        @include('components.admin-sidebar')

        <div class="col-8">
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
                        <td>
                            <div class="dropdown">
                                <button>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    <button class="dropdown-list">
                                        Delete User
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
  
<footer class="footer">
    @include('components.footer')
</footer>

@endsection