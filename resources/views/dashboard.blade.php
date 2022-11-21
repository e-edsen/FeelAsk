<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2> --}}
        {{-- <div class="form-control">
            <div class="input-group">
                <input type="text" placeholder="Search…" class="input input-bordered" />
                <button class="btn btn-square">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>
        </div> --}}
    </x-slot>

    <div class="py-12 flex flex-row">
        <div class="max-w-7xl mx-3 sm:px-6 lg:px-8">
            <div class="card w-80 bg-base-100 shadow-xl outline outline-1 outline-blue-500">
                <div class="card-body p-6">
                    <a href="/profile">
                        <h2 class="card-title font-bold mb-3 text-blue-500">Your Profile</h2>
                        <div class="flex flexrow w-full items-center justify-center">
                            {{-- Avatar --}}
                            <div class="avatar">
                                <div class="w-24 rounded-full">
                                    <img src="{{ Auth::user()->profpic_url }}" />
                                </div>
                            </div>

                            {{-- User Info --}}
                            <div class="mx-3 w-full">

                                <h1 class="font-bold">{{ Auth::user()->name }}
                                    @if (Auth::user()->is_mitra)
                                        ☑️
                                    @endif
                                </h1>
                                <h1>{{ Auth::user()->prodi }}</h1>
                                <h1>{{ Auth::user()->angkatan }}</h1>

                                @if (!Auth::user()->prodi || !Auth::user()->angkatan)
                                    <a class="text-red-500" href="/profile">Lengkapi Profilmu!</a>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border border-blue-500 shadow-sm sm:rounded-lg">
                <div class="p-6 w-86 bg-white">
                    {{-- You're logged in! --}}
                    <form action="{{ route('post.store') }}" method="post">
                        @csrf
                        <h1 class="font-bold text-blue-600 text-3xl mb-4">Have Question?</h1>
                        <textarea name="body" class="w-full block rounded textarea textarea-bordered"
                            placeholder="Tanyakan dengan Mata Kuliah - Pertanyaan contohnya: PGI - Apa itu data raster?" rows="3">{{ old('body') }}</textarea>

                        {{-- Error Posting --}}
                        @error('body')
                            <div class="text-red-600 mt-1">{{ $message }}</div>
                        @enderror

                        {{-- Berhasil Posting --}}
                        @if (session('success'))
                            <div class="alert alert-success shadow-lg my-3">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ session('success') }}</span>
                                </div>
                            </div>
                        @endif

                        <input type="submit" value="Ask Now"
                            class="btn mt-3 border-none bg-orange-400 hover:bg-orange-500">
                    </form>
                </div>
            </div>

            @foreach ($posts as $post)
                <div class="card w-full my-3 bg-base-100 shadow-xl outline outline-1 outline-blue-500">
                    <div class="card-body">
                        {{-- show profile image --}}
                        <div class="flex flex-row">
                            <img src={{ $post->user->profpic_url }} class="rounded-full w-10 h-10 mr-3 mt-2 justify-center items-center" />


                            <div>
                                <h2 class="card-title">{{ $post->user->name }}
                                    @if ($post->user->is_mitra)
                                        ☑️
                                    @endif
                                </h2>
                                <span class="text-gray-400 text-sm">{{ $post->user->prodi }} -
                                    {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p>{{ $post->body }}</p>
                        <div class="card-actions mt-6">
                            <a href="{{ route('post.show', $post) }}"
                                class="justify-end text-blue-600 hover:text-blue-700">Show Comment
                                ({{ $post->comments_count }})
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="max-w-7xl mx-5 sm:px-6 lg:px-8">
            <div class="card w-64 bg-base-100 shadow-xl outline outline-1 outline-blue-500">
                <div class="card-body ">
                    <h2 class="card-title font-bold text-blue-500">Subject</h2>
                    {{-- ALL --}}
                    <div class="text-regular font-medium mt-4">
                        Sistem Informasi
                    </div>
                    <div class="flex flex-col text-blue-500 ">
                        <a href="/dashboard?search=iesi" class="hover:text-blue-700">IESI</a>
                        <a href="/dashboard?search=se" class="hover:text-blue-700">SE</a>
                        <a href="/dashboard?search=pgi" class="hover:text-blue-700">PGI</a>
                        <a href="/dashboard?search=mrksi" class="hover:text-blue-700">MRKSI</a>
                        <a href="/dashboard?search=papb" class="hover:text-blue-700">PAPB</a>
                    </div>


                    <div class="text-regular font-medium">
                        Pendidikan Teknologi Informasi
                    </div>
                    <div class="flex flex-col text-blue-500 ">
                        <a href="/dashboard?search=dm" class="hover:text-blue-700">Data Mining</a>
                        <a href="/dashboard?search=ipsi" class="hover:text-blue-700">IPSI</a>
                        <a href="/dashboard?search=dpb" class="hover:text-blue-700">DPB</a>
                        <a href="/dashboard?search=pmpk" class="hover:text-blue-700">PMPK</a>
                        <a href="/dashboard?search=mpsi" class="hover:text-blue-700">MPSI</a>
                    </div>


                    <div class="text-regular font-medium">
                        Teknik Informatika
                    </div>
                    <div class="flex flex-col text-blue-500 ">
                        <a href="/dashboard?search=psi" class="hover:text-blue-700">PSI</a>
                        <a href="/dashboard?search=rpl" class="hover:text-blue-700">RPL</a>
                        <a href="/dashboard?search=ppp" class="hover:text-blue-700">PPP</a>
                        <a href="/dashboard?search=miti" class="hover:text-blue-700">MITI</a>
                        <a href="/dashboard?search=mppi" class="hover:text-blue-700">MPPI</a>
                    </div>


                    <div class="text-regular font-medium">
                        Teknik Komputer
                    </div>
                    <div class="flex flex-col text-blue-500 ">
                        <a href="/dashboard?search=aokl" class="hover:text-blue-700">AOKL</a>
                        <a href="/dashboard?search=glt" class="hover:text-blue-700">GLT</a>
                        <a href="/dashboard?search=rel" class="hover:text-blue-700">REL</a>
                        <a href="/dashboard?search=psi" class="hover:text-blue-700">PSI</a>
                        <a href="/dashboard?search=sna" class="hover:text-blue-700">SNA</a>
                    </div>


                    <div class="text-regular font-medium">
                        Teknologi Informasi
                    </div>
                    <div class="flex flex-col text-blue-500 ">
                        <a href="/dashboard?search=abd" class="hover:text-blue-700">ABD</a>
                        <a href="/dashboard?search=mppi" class="hover:text-blue-700">MPPI</a>
                        <a href="/dashboard?search=mpti" class="hover:text-blue-700">MPTI</a>
                        <a href="/dashboard?search=dm" class="hover:text-blue-700">DM</a>
                        <a href="/dashboard?search=pit" class="hover:text-blue-700">PIT</a>
                    </div>

                    <div class="card-actions justify-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
