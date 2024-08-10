@extends('layouts.app')

@section('title', 'Adimin NG Word')

@section('content')

    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            @include('components.admin-sidebar')

            <div class="col-9">
                {{-- NG Word input form --}}
                <form action="{{ route('admin.ngwords.store') }}" method="post">
                    @csrf

                    <div class="row gx-2 mb-3">
                        <div class="col-5">
                            <input type="text" name="word" id="word" class="form-control"
                                placeholder="Add new NG word" autofocus>
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
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($all_ngwords as $ngword)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ngword->word }}</td>
                                <td>{{ $ngword->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </button>

                                        <div class="dropdown-menu text-center">
                                            <button class="dropdown-list" data-bs-toggle="modal"
                                                data-bs-target="#deleteNGWordModal">
                                                Delete NG Word
                                            </button>
                                        </div>
                                    </div>   
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <p>No NG words found.</p>
                            </tr>
                        @endforelse
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
            {{-- @include('components.delete-ngword-modal') --}}

@endsection
