@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    @include('components.navbar')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-7">

                {{-- image --}}
                <div class="row mb-3">
                    <div class="col">
                        <img src="https://images.pexels.com/photos/25539620/pexels-photo-25539620.jpeg?auto=compress&cs=tinysrgb&w=800"
                            class="posts-show-image w-100" alt="post id">
                    </div>
                </div>
                <div class="row">
                    {{-- title and icon --}}
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-r">
                            <h3>Beautiful view</h3>
                            <a href="{{ route('posts.edit') }}" class="text-decoration-none text-dark">
                                <i class="fa-solid fa-pen icon-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- avatar,username and category --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa-solid fa-circle-user text-secondary icon-sm me-2"></i>
                            <a href="#" class="text-decoration-none text-dark me-auto">Mary Watson</a>
                            <i class="fa-solid fa-rectangle-ad"></i>
                        </div>
                    </div>
                </div>
                {{-- date of post --}}
                <div class="row">
                    <div class="col">
                        <p class="show-date">2024-06-10</p>
                    </div>
                </div>
                {{-- discription --}}
                <div class="row">
                    <div class="col">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repudiandae animi ad sunt, odit
                            molestias laudantium quisquam, natus quibusdam, suscipit ab aperiam. Deleniti voluptas
                            voluptatibus
                            quidem aspernatur nobis ex praesentium atque cumque, nesciunt eius, illo eveniet? Quibusdam
                            alias
                            delectus reprehenderit numquam, necessitatibus reiciendis impedit magnam deserunt dolorum
                            maxime,
                            similique Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla autem laudantium ad
                            similique illo praesentium alias ipsa animi asperiores quisquam. Amet quisquam fugit in
                            architecto
                            quam deleniti consequuntur aspernatur corporis aliquam qui voluptate impedit perferendis tenetur
                            corrupti pariatur dicta temporibus doloribus nemo, doloremque esse minima at consectetur. Nulla,
                            asperiores eos.</p>
                    </div>
                </div>
                {{-- post comment --}}
                <div class="row">
                    <div class="col">
                        <form action="#" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <textarea name="comment_body" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment_body') }}</textarea>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- show comments --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa-solid fa-circle-user text-secondary icon-sm me-2"></i>
                            <a href="#" class="text-decoration-none text-dark me-auto mt-0 pt-0">Mary Watson</a>
                            <p class="show-date">2024-06-10</p>
                        </div>
                        <p>beautiful place</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
