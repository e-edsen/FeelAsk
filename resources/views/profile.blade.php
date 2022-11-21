<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-row">
        <div class="max-w-7xl mx-3 sm:px-6 lg:px-8">
            <div class="card w-80 bg-base-100 shadow-xl">
                <div class="card-body p-6">
                    <h2 class="card-title font-bold mb-3">Your Profile</h2>
                    <div class="flex flexrow w-full items-center justify-center">
                        {{-- Avatar --}}
                        <div class="avatar">
                            <div class="w-24 rounded-full">
                                <img src="{{ Auth::user()->profpic_url }}" />
                            </div>
                        </div>

                        {{-- User Info --}}
                        <div class="mx-3 w-full">
                            <h1 class="font-bold">{{ Auth::user()->name }}</h1>
                            <h1>{{ Auth::user()->prodi }}</h1>
                            <h1>{{ Auth::user()->angkatan }}</h1>

                            @if(!Auth::user()->prodi || !Auth::user()->angkatan)
                            <a class="text-red-500" href="/dashboard">Lengkapi Profilmu!</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-5 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 w-86 bg-white border-b border-gray-200">

                    @if(session()->has('message'))
                        <h1 class="text-green-400 font-semibold mb-3">{{ session()->get('message') }}!</h1>
                    @endif
                    <h2 class="card-title font-bold mb-5">Edit Profile</h2>
                    {{-- You're logged in! --}}
                    <form action="{{ route('profile.update') }}" method="post">


                        @method("put")
                        @csrf
                        <div class="flex flex-col">
                            {{-- Edit Nama --}}
                            <h1 class="items-center mr-5 justify-center">Nama</h1>
                            <input name="name" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ old('name', Auth::user()->name) }}" />
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror

                            {{--Edit Profpic --}}
                            <h1 class="items-center mr-5 justify-center mt-3">Link Foto Profil</h1>
                            <input name="profpic_url" type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ old('profipic_url', Auth::user()->profpic_url) }}" />
                            @error('profpic_url')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-3">
                            {{-- Edit Prodi --}}
                            <h1 class="items-center mr-5 justify-center">Program Studi</h1>
                            <select name="prodi" type="text" class="select select-info w-full max-w-xs">
                                <option selected class="text-gray-400">{{ old('prodi', Auth::user()->prodi) }}</option>
                                <option>Sistem Informasi</option>
                                <option>Teknologi Informasi</option>
                                <option>Pendidikan Teknologi Informasi</option>
                                <option>Teknik Komputer</option>
                                <option>Teknik Informatika</option>
                            </select>
                            @error('prodi')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col my-3">
                            {{-- Edit Angkatan --}}
                            <h1 class="items-center mr-5 justify-center">Angkatan</h1>
                            <select name="angkatan" type="text" class="select select-info w-full max-w-xs">
                                <option selected class="text-gray-500">{{ old('angkatan', Auth::user()->angkatan) }}</option>
                                <option>2022</option>
                                <option>2021</option>
                                <option>2020</option>
                                <option>2019</option>
                                <option>2018</option>
                                <option>2017</option>
                            </select>
                            @error('angkatan')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class='btn bg-orange-400 hover:bg-orange-500 outline-none border-none mt-5'></input>
                    </form>
                </div>
            </div>

</x-app-layout>
