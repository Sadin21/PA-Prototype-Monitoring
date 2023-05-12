@extends('admin-layout')

@section('content')
  <section class="bg-white px-44 w-full py-5 shadow-md">
    <h1 class="font-semibold text-2xl">Dashboard Admin</h1>
  </section>
  <section class="px-44 pt-14">
    <div class="container w-full mb-24">
        <div class="pt-2">
            <div class="px-4 py-4 mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
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
                                    Nama Koordinator
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
                                    <p class="text-gray-900 whitespace-no-wrap">
                                      {{ $d->coordinator_name }}
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
                                  <a href="{{ route('admin.edit_pengajuan', $d->id) }}" type="button" class="py-2 w-14 px-2 flex justify-center items-center  bg-yellow-500 hover:bg-yellow-700 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 h-12 rounded-lg ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="10" height="10" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                  </a>
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
  </section>
@endsection