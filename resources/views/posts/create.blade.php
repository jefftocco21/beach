<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4 ">
            New Post
        </h1>
        <x-panel>
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-6">
                  <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                    for="title"
                  >
                  Title
                </label>
                
                <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
                    value="{{old('title')}}"
                    required
                    >
    
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                      for="slug"
                    >
                    Slug
                  </label>
                  
                  <input class="border border-gray-400 p-2 w-full"
                      type="text"
                      name="slug"
                      id="slug"
                      value="{{old('slug')}}"
                      required
                      >
      
                      @error('slug')
                          <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                      @enderror
                  </div>

                  <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                      for="thumbnail"
                    >
                    Thumbnail
                  </label>
                  
                  <input class="border border-gray-400 p-2 w-full"
                      type="file"
                      name="thumbnail"
                      id="thumbnail"
                      required
                      >
      
                      @error('thumbnail')
                          <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                      @enderror
                  </div>
    
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                      for="excerpt"
                    >
                    Excerpt
                  </label>
                  
                  <textarea class="border border-gray-400 p-2 w-full"
                      type="text"
                      name="excerpt"
                      id="excerpt"
                      required
                      value="{{old('excerpt')}}"></textarea>
      
                      @error('excerpt')
                          <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                      @enderror
                  </div>

                  <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                      for="body"
                    >
                    Body
                  </label>
                  
                  <textarea class="border border-gray-400 p-2 w-full"
                      type="body"
                      name="body"
                      id="body"
                      required
                      value="{{old('body')}}"></textarea>
      
                      @error('body')
                          <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                      @enderror
                  </div>

                  <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-cs text-gray-700"
                      for="category"
                    >
                    <option value="">Category</option>
                  </label>
                  
                  <select name="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                    @endforeach
                  </select>

                      @error('category')
                          <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                      @enderror
                  </div>

                  <x-submit-button>Publish</x-submit-button>

            </form>
        </x-panel>

    </section>
</x-layout>