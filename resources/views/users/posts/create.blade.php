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
          <select class="form-select form-select-lg mb-3">
               <option selected>Area of Japan</option>
               <option value="1">Hokkaidou</option>
               <option value="2">Touhoku</option>
               <option value="3">Kantou</option>
               <option value="4">Chuubu</option>
               <option value="5">Kinnki</option>
               <option value="6">Chuugoku</option>
               <option value="7">Shikoku</option>
               <option value="8">Kyuushuu</option>
          </select>
    </div>
  

  </form>

@endsection