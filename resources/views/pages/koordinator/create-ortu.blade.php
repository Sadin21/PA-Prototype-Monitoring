@extends('koor-layout')

@section('content')
<section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ url('/assets/images/' .auth()->user()->photo) }}" class="rounded-lg w-12 h-14"/>
    <h1 class="font-semibold text-2xl">{{ auth()->user()->name }}</h1>
  </section>
<section class="pt-10">
  <section class="h-screen shadow-md">
    <form action="{{ route('koor.store_pengajuan_ortu') }}" method="POST" class="container bg-white w-full mx-auto md:w-3/4 grid grid-cols-2 p-8 gap-8"  enctype="multipart/form-data">
        @csrf
        <div>
            <h1 class="pb-4">Nama</h1>
            <div class=" relative pb-4">
                <input type="text" name="name" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nama" value={{ old('name') }}>
                @error('name')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Tempat Lahir</h1>
            <div class=" relative pb-4">
                <input type="text" name="birth_place" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="tempat lahir" value={{ old('birth_place') }}>
                @error('birth_place')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Tanggal Lahir</h1>
            <div class=" relative pb-4">
                <input type="date" id="user-info-email" name="birth_date" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="tanggal lahir" value={{ old('birth_date') }}/>
                @error('birth_date')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Status Perkawinan</h1>
            <div class=" relative pb-4">
                <input type="text" id="user-info-email" name="marital" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="status perkawinan" value={{ old('marital') }}>
                @error('marital')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Pendidikan Terakhir</h1>
            <div class=" relative pb-4">
                <select
                data-te-select-init
                data-te-select-placeholder="Example placeholder"
                class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="tertiary_education">
                    <option value="SD">SD</option>
                    <option value="SMP / Sederajat">SMP / Sederajat</option>
                    <option value="SMA / Sederajat">SMA</option>
                    <option value="Diploma III / IV">Diploma III / IV</option>
                    <option value="Sarjana I / II /  III">Sarjana I / II /  III</option>
                </select>
                @error('tertiary_education')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Alamat</h1>
            <div class=" relative pb-4">
                <textarea type="text" id="user-info-email" name="address" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="alamat" rows="4" /></textarea>
                @error('address')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
        </div>
        <div class="">
            <h1 class="pb-4">Pekerjaan</h1>
            <div class=" relative pb-4">
                <input type="text" id="user-info-email" name="job" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="pekerjaan"/>
                @error('job')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Gaji</h1>
            <div class=" relative pb-4">
                <select
                data-te-select-init
                data-te-select-placeholder="Example placeholder"
                class="rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" name="salary">
                    <option value="0 - 1.000.000">0 - 1.000.000</option>
                    <option value="1.000.000 - 3.000.000">1.000.000 - 3.000.000</option>
                    <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                    <option value="> 5.000.000">> 5.000.000</option>
                </select>
                @error('salary')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Nomor HP</h1>
            <div class=" relative pb-4">
                <input type="number" id="user-info-email" name="phone" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="nomor hp"/>
                @error('phone')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Status Kepmilikan Rumah</h1>
            <div class=" relative pb-4">
                <input type="text" id="user-info-email" name="home_status" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="status rumah"/>
                @error('home_status')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Jumlah Tanggungan Jiwa</h1>
            <div class=" relative pb-4">
                <input type="number" id="user-info-email" name="number_of_souls" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="jiwa yang ditanggung"/>
                @error('number_of_souls')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <h1 class="pb-4">Kategori Jiwa</h1>
            <div class=" relative pb-4">
                <input type="text" id="user-info-email" name="category_of_souls" class=" rounded-lg border-1 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="kategori jiwa"/>
                @error('category_of_souls')
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4 p-4" role="alert">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
            <button type="submit" class="py-2 w-24 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg mt-4">
                Submit
            </button>
        </div>
    </form>
  </section>
</section>
@endsection