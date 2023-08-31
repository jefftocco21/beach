@auth
                    <x-panel>
                        <form method="POST" action="/posts/{{$post->slug}}/comments" class="">
                            @csrf
                            
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?={{ auth()->id() }}" alt="" width="40" height="40" class = "rounded-full">

                                <h2 class="ml-3 font-weight-bold">Comment Below!</h2>
                            </header>

                            <div class="mt-6">
                                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Add a comment here..." required></textarea>

                                @error('body')
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="flex justify-end mt-6 pt-6 border-gray-200 pt-6">
                                <x-form.button>Post</x-form.button>
                            </div>

                        </form> 
                    </x-panel>
                    @else
                        <p class="font-semibold">
                            <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
                        </p>
@endauth 