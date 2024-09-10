@extends('layouts.app')

@section('title', 'Adimin NG Word')

@section('content')
    <div class="container mt-5">
        <div class="row">

            <!-- Include the sidebar here-->
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

                    {{-- error --}}
                    @error('word')
                     <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </form>

                {{-- NG Word Table --}}
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
                        @forelse ($all_ngwords as $ng_word)
                            <tr>
                                <td>{{ $ng_word->id }}</td>
                                <td>{{ $ng_word->word }}</td>
                                <td>{{ $ng_word->created_at }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteNGWordModal-{{ $ng_word->id }}">
                                    <i class="fa-solid fa-trash-can"></i>                                   
                                    </button>
                                </td>
                            </tr>
                            <!-- Include the modal here-->
                            @include('components.delete-ngword-modal')
                        @empty
                            <tr>
                                <p>No NG words found.</p>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $all_ngwords->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
