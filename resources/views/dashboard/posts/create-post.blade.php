@extends('layouts.mainDash')

@section('container')
    <h1>Create Post</h1>
 
   

{{-- @if (session()->has('success'))
    {{ session('success') }}
@endif --}}

    <div class="row">
        <div class="col-8">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label for="title" class="form-label ">Title</label>
                  <input type="text" class="form-control @error('title') ? is-invalid  @enderror" id="title" name="title" value="{{ old('title') }}">
                  @error('title')
                 <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control  @error('slug') is-invalid @enderror " id="slug" name="slug" value="{{ old('slug') }}"> 
                  @error('slug')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="slug" class="form-label">Category</label>
                  @error('category_id') 
              <p class=" text-danger">{{ $message }}</p> 
                  @enderror
                  <select class="form-select" name="category_id" >
                  @foreach ($categories as $category)
                  @if (old('category_id') == $category->id )
                  <option value="{{ $category->id }}" selected> {{  $category->name }}</option>
                  @else
                  <option value="{{ $category->id }}"> {{  $category->name }}</option>
                  @endif
                  @endforeach
                </select>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <div class="preview">
                    <img id="file-ip-1-preview">
                  </div>
                  <input class="form-control @error('image') is-invalid  @enderror" type="file" id="image" name="image" accept="image/*" onchange="showPreview(event);">
                  @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div> 
                <div class="mb-3">
                  <label for="body" class="form-label">Body</label>
                  @error('body')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                  <trix-editor input="body"   ></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>   
        </div>
    </div>

    <script>

      // preview image
      function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    console.log(src)
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
        fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
      });



      document.addEventListener('trix-file-accept', (e) => e.preventDefault());

              // image preview 
      const previewImage = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
    </script>

@endsection