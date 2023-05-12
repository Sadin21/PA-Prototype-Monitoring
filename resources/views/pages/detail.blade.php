@extends('dashboard-layout')

@section('content')
  <section class="bg-white px-44 w-full py-5 shadow-md flex items-center gap-4">
    <img src="{{ url('/assets/images/' .auth()->user()->photo) }}" class="rounded-lg w-12 h-14"/>
    <h1 class="font-semibold text-2xl">{{ auth()->user()->name }}</h1>
  </section>
  <section class="px-44 pt-14">
    <div class="p-4 bg-white shadow-lg rounded-2xl">
        <div class="flex flex-row items-start gap-4">
            <img src="{{ url("/assets/images/{$d->photo}") }}" class="rounded-lg w-28 h-28"/>
            <div class="flex flex-col justify-between w-full h-28">
                <div>
                    <p class="text-xl font-medium text-gray-800">
                        {{ $d->name  }}
                    </p>
                    <p class="text-xs text-gray-400">
                       nama koordinator {{ $d->coordinator_name  }}
                    </p>
                    <p class="text-xs text-gray-400">
                      nama wali {{ $d->parent_name  }}
                   </p>
                </div>
                <div class="w-full p-2 bg-blue-100 rounded-lg dark:bg-white">
                    <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                        <p class="flex flex-col">
                            Sekolah
                            <span class="font-bold text-black">
                                {{ $d->school   }}
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
  </section>
@endsection