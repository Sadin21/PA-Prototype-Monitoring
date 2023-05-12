@extends('koor-layout')

@section('content')
<section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ url('/assets/images/' .auth()->user()->photo) }}" class="rounded-lg w-12 h-14"/>
    <h1 class="font-semibold text-2xl">{{ auth()->user()->name }}</h1>
  </section>
<section class="px-44 pt-8">
  <div class="flex gap-4 justify-end">
    <a href="{{ route('koor.create_pengajuan_ortu') }}" type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-32 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
      Orang Tua
    </a>
  </div>
  <div>
    <div class="container w-full">
      <div class="pt-4">
          <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
              <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                  <table class="min-w-full leading-normal">
                      <thead>
                          <tr>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Nama
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Pendidikan
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Pekerjaan
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Jiwa yang ditanggung
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200 w-20">
                                  Aksi
                            </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($dataParents as $p)
                          <tr>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <div class="flex items-center">
                                      <div class="ml-3">
                                          <p class="text-gray-900 whitespace-no-wrap">
                                              {{ $p->name }}
                                          </p>
                                      </div>
                                  </div>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                      {{ $p->tertiary_education }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $p->job }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $p->number_of_souls }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-4">
                                <a href="{{ route('koor.edit_pengajuan_ortu', $p->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                  </svg>
                                </a>
                                <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('koor.delete_pengajuan-ortu', $p->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="py-2 w-14 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                      <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                              
                                  </button>
                                </form>
                            </td>
                          </tr>
                        @empty
                            <h1>data kosonggg</h1>
                        @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>

    <div class="flex gap-4 justify-end mt-8">
      <a href="{{ route('koor.create_pengajuan_anak') }}" type="button" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-32 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
        Anak Asuh
      </a>
    </div>
    {{-- Anak Asuh --}}
    <div class="container w-full mb-24">
      <div class="pt-2">
          <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
              <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                  <table class="min-w-full leading-normal">
                      <thead>
                          <tr>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Nama
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Status
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Alamat
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Nama Wali
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Registrasi
                            </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200 w-20">
                                  Aksi
                            </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($dataChildren as $d)
                          <tr>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" class="relative block">
                                            <img src="{{ url("/assets/images/{$d->photo}") }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                        </a>
                                    </div>
                                      <div class="ml-3">
                                          <p class="text-gray-900 whitespace-no-wrap">
                                              {{ $d->name }}
                                          </p>
                                      </div>
                                  </div>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $d->status_in_family }}
                                </p>
                            </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                      {{ $d->parent_address }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $d->parent_name }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                  <span aria-hidden="true" class="absolute inset-0 {{ $d->regis_status == 'Aktif' ? 'bg-green-200' : 'bg-yellow-200'}} rounded-full opacity-50">
                                  </span>
                                  <span class="relative">
                                      {{ $d->regis_status }}
                                  </span>
                                </span>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 flex gap-4">
                                <a href="{{ route('koor.edit_pengajuan_anak', $d->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                  </svg>
                                </a>
                                <form onsubmit="return confirm('Apakah anda yakin?')" action="{{ route('koor.delete_pengajuan-anak', $d->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="py-2 w-14 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                                      <path strokeLinecap="round" strokeLinejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                              
                                  </button>
                                </form>
                            </td>
                          </tr>
                        @empty
                            <h1>data kosonggg</h1>
                        @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection