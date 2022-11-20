<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2> --}}
    </x-slot>

    <div class="py-12 flex flex-row">
        <div class="max-w-7xl mx-3 sm:px-6 lg:px-8">
            <div class="card w-80 bg-base-100 shadow-xl">
                <div class="card-body p-6">
                    <a href="/profile">
                        <h2 class="card-title font-bold mb-3">Your Profile</h2>
                        <div class="flex flexrow w-full items-center justify-center">
                            {{-- Avatar --}}
                            <div class="avatar">
                                <div class="w-24 rounded-full">
                                    <img src="https://placeimg.com/192/192/people" />
                                </div>
                            </div>

                            {{-- User Info --}}
                            <div class="mx-3 w-full">

                                <h1 class="font-bold">{{ Auth::user()->name }}
                                @if(Auth::user()->is_mitra)
                                    ☑️
                                @endif
                                </h1>
                                <h1>{{ Auth::user()->prodi }}</h1>
                                <h1>{{ Auth::user()->angkatan }}</h1>

                                @if(!Auth::user()->prodi || !Auth::user()->angkatan)
                                <a class="text-red-500" href="/profile">Lengkapi Profilmu!</a>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 w-86 bg-white border-b border-gray-200">
                    {{-- You're logged in! --}}
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <h1 class="font-bold text-blue-600 text-3xl mb-4">Have Question?</h1>
                        <textarea name="body" class="w-full block rounded textarea textarea-bordered" placeholder="Post question" rows="3">{{ old('body') }}</textarea>

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

                        <input type="submit" value="Ask Now" class="btn mt-2 bg-blue-600">
                    </form>
                </div>
            </div>

            @foreach($posts as $post)
            <div class="card w-full my-3 bg-base-100 shadow-xl">
                <div class="card-body">
                    {{-- show profile image --}}
                    <div class="flex flex-row">
                        <img src="https://placeimg.com/192/192/people" class="rounded-full w-10 h-10 mr-3 mt-2 justify-center items-center" />

                        <div>
                            <h2 class="card-title">{{ $post->user->name }}
                            @if($post->user->is_mitra)
                                ☑️
                            @endif
                            </h2>
                            <span class="text-gray-400 text-sm">{{ $post->user->prodi }} - IESI - {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <p>{{ $post->body }}</p>
                    <div class="card-actions mt-6">
                        <a href="{{ route('post.show', $post) }}" class="justify-end text-blue-700">Show Comment ({{ $post->comments_count }})</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="max-w-7xl mx-5 sm:px-6 lg:px-8">
            <div class="card w-64 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Subject</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
