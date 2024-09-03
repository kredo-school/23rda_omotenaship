@extends('layouts.app')



@section('content')
    <!-- Include the modal here-->
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            @include('components.admin-sidebar')

            <div class="col-9">
                <table class="table table-hover align-middle border text-center">
                    <thead>
                        <tr class="admin-table-header">
                            <th></th>
                            <th>Title</th>
                            <th>PostBy</th>
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
                                    <a href="{{ route('admin.posts.show', $post->id) }}">
                                        @if ($post->images->isNotEmpty())
                                            <img src="{{ $post->images->first()->image }}" alt="{{ $post->id }}" class="admin-post-image">
                                        @else
                                            <i class="fa-solid fa-circle-user icon-sm"></i>
                                        @endif
                                    </a>
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#deletePostModal-{{ $post->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Include the modal here-->
                            @include('components.admin-delete-post-modal')
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
@endsection
