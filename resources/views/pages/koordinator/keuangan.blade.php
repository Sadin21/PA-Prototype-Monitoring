@extends('koor-layout')

@section('content')
<section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ url('/assets/images/' .auth()->user()->photo) }}" class="rounded-lg w-12 h-14"/>
    <h1 class="font-semibold text-2xl">{{ auth()->user()->name }}</h1>
  </section>
<section class="px-44 pt-8">
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
                                  Nominal
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Tanggal
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                  Status
                              </th>
                              <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Bukti
                            </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($dataDonate as $d)
                          <tr>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <div class="flex items-center">
                                      <div class="ml-3">
                                          <p class="text-gray-900 whitespace-no-wrap">
                                              {{ $d->child_name }}
                                          </p>
                                      </div>
                                  </div>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                      {{ $d->nominal}}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $d->date }}
                                  </p>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                  <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                  </span>
                                  <span class="relative">
                                      {{ $d->status }}
                                  </span>
                                </span>
                              </td>
                              <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                  <div class="flex-shrink-0">
                                    <a href="#" class="relative block">
                                        <img src="{{ url("/assets/images/{$d->file}") }}" class="mx-auto object-cover rounded-sm h-28 w-3h-28 "/>
                                    </a>
                                </div>
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