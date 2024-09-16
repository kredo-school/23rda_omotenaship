@extends('layouts.app')

@section('title', 'Adimin Inquires')

@section('content')
    <div class="container-fluid mt-5 px-5">
        <div class="row">
            @include('components.admin-sidebar')

            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-hover align-middle border text-center">
                        <thead>
                            <tr class="admin-table-header">
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="hide-on-mobile">Content</th>
                                <th class="hide-on-mobile">Inquire_Date</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @csrf

                            @foreach ($all_inquires as $inquire)
                                <tr>
                                    <td>

                                    </td>
                                    <td>{{ $inquire->name }}</td>
                                    <td>{{ $inquire->email }}</td>
                                    <td class="hide-on-mobile">{{ $inquire->content }}</td>
                                    <td class="hide-on-mobile">{{ $inquire->created_at }}</td>
                                    <td>
                                        <button class="btn" data-bs-toggle="modal"
                                            data-bs-target="#deletePostModal-{{ $inquire->id }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Include the modal here-->
                                {{-- @include('components.admin-delete-post-modal') --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $all_inquires->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
