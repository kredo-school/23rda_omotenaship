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
                            <th>VisiteDate</th>
                            <th>Create</th>
                            <th>Update</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @csrf

                        @foreach ($all_posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.posts.index', $post->user->id) }}">
                                    @if ($post->images->isNotEmpty())
                                    <img src="{{ $post->images->first()->image }}" alt="{{ $post->id }}">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm"></i>
                                    @endif
                                    </a>
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->visit_date }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
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
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $all_posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Include the modal here-->
    @include('components.footer')

    <!-- Include the modal here-->
    @include('components.delete-post-modal')
@endsection

