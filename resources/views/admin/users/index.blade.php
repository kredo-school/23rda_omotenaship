@extends('layouts.app')

@section('title', 'Adimin Users')

@section('content')
    <!-- Include the modal here-->
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            
            <!-- Include the sidebar here-->
            @include('components.admin-sidebar')

            <div class="col-md-9">
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
                        @csrf

                        @foreach ($all_profiles as $profile)
                            <tr>
                                <td>
                                    @if ($profile && $profile->avatar)
                                        <img src="{{ $profile->avatar }}" alt="profile-avatar"
                                            class="rounded-circle d-block avatar-md admin-profile-avatar">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm"></i>
                                    @endif
                                </td>
                                <td>
                                    {{ $profile->first_name }} {{ $profile->last_name }} {{ $profile->middle_name }}
                                </td>
                                <td>{{ $profile->birth_date }}</td>
                                <td>{{ $profile->language }}</td>
                                <td>{{ $profile->created_at }}</td>
                                <td>{{ $profile->updated_at }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal-{{ $profile->user->id }}">
                                    <i class="fa-solid fa-trash-can"></i>                                   
                                    </button>
                                </td>
                            </tr>

                            <!-- Include the modal here-->
                            @include('components.delete-user-modal')

                        @endforeach
                    </tbody>
                </table>
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $all_profiles->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Include the modal here-->
    @include('components.footer')
@endsection

