@extends('layouts.app')

@section('title','New Post')

@section('content')
  <form action="#" method="post" enctype="multipart/formdata">
     @csrf
     
    <div class="mb-3">
       <label for="category" class="form-label d-block fw-bold">
           Category <div class="span text-muted"></div>
       </label>

       <!-- #foreach -->
        @foreach($all_categories as $category)
          <div class="form-check form-check-inline">
              <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input">

              <label for="{{ $category->name }}" class="form-check-label">
                {{ $category->name }}
              </label>
          </div>
        @endforeach
        <!-- Error -->
          @error('catogory')
             <div class="text-danger small">{{ $message }}</div>
          @enderror
    </div>

    <div class="mb-3">
        <label for="title" class="form-label fw-bold">Title</label>
        <textarea name="title" id="title" class="form-control">{{ old('title') }}</textarea>
        <!-- Error -->
        @error('title')
             <div class="text-danger small">{{ $message }}</div>
         @enderror
    </div>

    <div class="mb-3">
        <label for="article" class="form-label fw-bold">Article</label>
        <textarea name="article" id="article" rows="3" class="form-control">{{ old('article') }}</textarea>
        <!-- Error -->
        @error('article')
             <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="form-label fw-bold">Image</label>
           <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
              <div class="form-text" id="image-info">
                  <p class="mb-0">The acceptable formats are jpeg, jpg, png and gif only.</p>
                  <p class="mb-0">Maximum file size is 1048kb.</p>
              </div>
              <!-- Error -->
              @error('image')
                  <div class="text-danger small">{{ $message }}</div>
              @enderror
    </div>

    <div class="mb-3">
        <label for="date" class="form-control fw-bold">Date of visit</label>
        <textarea name="date" id="date" class="form-control" placeholder="YYYY/MM/DD">{{ old('date') }}</textarea>
        <!-- Error -->
        @error('date')
             <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
   <div class="mb-3">
       <label for="area" class="form-control fw-bold">Area of Japan</label>
          <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-taggle"type="button" data-bs-toggle="dropdown" aria-expanded="false">Area of Japan</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Hokkaidou</a></li>
                    <li><a class="dropdown-item" href="#">Touhoku</a></li>
                    <li><a class="dropdown-item" href="#">Kantou</a></li>
                    <li><a class="dropdown-item" href="#">Chuubu</a></li>
                    <li><a class="dropdown-item" href="#">Kinnki</a></li>
                    <li><a class="dropdown-item" href="#">Chuugoku</a></li>
                    <li><a class="dropdown-item" href="#">Shikoku</a></li>
                    <li><a class="dropdown-item" href="#">Kyuushuu</a></li>
                </ul>
          </div>
    </div>

  </form>

@endsection