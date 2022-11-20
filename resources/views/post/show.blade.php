<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Detail') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card w-full my-3 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->user->name }}
                    <span class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </h2>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card-body">
                        {{-- You're logged in! --}}
                        <form action="{{ route('post.comment.store', $post) }}" method="post">
                            @csrf
                            <textarea name="body" class="w-full block rounded textarea textarea-bordered" placeholder="Leave an answer..." rows="3">{{ old('body') }}</textarea>

                            {{-- Error Posting --}}
                            @error('body')
                            <div class="text-red-600 mt-1">{{ $message }}</div>
                            @enderror

                            {{-- Berhasil Posting --}}
                            @if(session('success'))
                                <div class="alert alert-success shadow-lg my-3">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>{{ session('success') }}</span>
                                    </div>
                                </div>
                            @endif

                            <input type="submit" value="Post" class="btn mt-2">
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-3xl my-3">
            <h1>Comments</h1>
        </div>
        @foreach($post->comments as $comment)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card w-full my-3 bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $comment->user->name }}
                        <span class="text-gray-400 text-sm">{{ $comment->created_at->diffForHumans() }}</span>

                        {{-- Delete Comment --}}
                        @if($comment->user_id == Auth::user()->id || $post->user_id == Auth::user()->id)
                            <form action="{{ route('post.comment.destroy', [$comment->post, $comment]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-error text-white">
                            </form>
                        @endif

                        </h2>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div

</x-app-layout>