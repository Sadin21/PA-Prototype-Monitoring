@extends('admin-layout')

@section('content')
  <section class="bg-white px-44 w-full py-5 shadow-md">
    <h1 class="font-semibold text-2xl">Dashboard Admin</h1>
  </section>
  <section class="px-44 pt-14 grid grid-cols-3 gap-8">
    @foreach ($dataUser as $d)
      <div>
        <div class="p-4 bg-white shadow-lg rounded-2xl">
          <div class="flex flex-row items-start gap-4">
              <img src="{{ url("/assets/images/{$d->photo}") }}" class="rounded-lg w-28 h-28"/>
              <div class="flex flex-col justify-between w-full h-28">
                  <div>
                      <p class="text-xl font-medium text-gray-800">
                          {{ $d->name  }}
                      </p>
                      <p class="text-xs text-gray-400">
                         role {{ $d->role_name  }}
                      </p>
                  </div>
                  <div class="w-full p-2 bg-blue-100 rounded-lg dark:bg-white">
                      <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                          <p class="flex flex-col">
                              Anak Asuh
                              <span class="font-bold text-black">
                                  34
                              </span>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="flex items-center justify-between gap-4 mt-6">
              <button type="button" class="w-1/2 px-4 py-2 text-base bg-white border rounded-lg text-grey-500 hover:bg-gray-200 ">
                  Detail
              </button>
              <button type="button" class="w-1/2 px-4 py-2 text-base text-white bg-indigo-500 border rounded-lg hover:bg-indigo-700 ">
                  Chat
              </button>
          </div>
        </div>
      </div>
    @endforeach
  </section>
@endsection