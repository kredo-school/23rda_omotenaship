@extends('layouts.app')

@section('title','Show Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       {{-- image --}}
            <div class="col-7">
              <img src="https://images.pexels.com/photos/2466608/pexels-photo-2466608.jpeg" class="w-100 posts-image" alt="post image">
            </div>
       {{-- title and icon --}}
       {{-- avatar and category --}}
         @include('users.posts.contents.title')
    </div>
    <div class="row justify-content-center">
       <div class="col-7">
         <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat repudiandae animi ad sunt, odit molestias laudantium quisquam, natus quibusdam, suscipit ab aperiam. Deleniti voluptas voluptatibus quidem aspernatur nobis ex praesentium atque cumque, nesciunt eius, illo eveniet? Quibusdam alias delectus reprehenderit numquam, necessitatibus reiciendis impedit magnam deserunt dolorum maxime, similique 
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla autem laudantium ad similique illo praesentium alias ipsa animi asperiores quisquam. Amet quisquam fugit in architecto quam deleniti consequuntur aspernatur corporis aliquam qui voluptate impedit perferendis tenetur corrupti pariatur dicta temporibus doloribus nemo, doloremque esse minima at consectetur. Nulla, asperiores eos.</p>
       </div>
    </div>
    {{-- comment --}}
    <div class="row justify-content-center">
       <div class="col-7">
          <form action="#" method="post">
          @csrf

           <div class="input-group">
               <textarea name="comment_body" id="" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment_body') }}</textarea>
               <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
           </div>
         </form>
      </div>
      {{-- show all comment --}}
    </div>

</div>
@endsection