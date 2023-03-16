<x-app-layout>
    {{-- @dd($image); --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Expense') }}
        </h2>
    </x-slot>


    <div class="flex justify-center max-w-full mx-auto sm:px-6 lg:px-8 space-y-6 text-white">

        <article class="max-w-4xl px-10 my-4 py-6 bg-white rounded-lg shadow-md">
            <header class="flex justify-between items-center">
                <span class="font-light text-gray-600">{{$expense->date}}</span>
                <div class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded">{{$expense->category}}</div>
            </header>
            <div class="mt-2">
                <div class="text-2xl text-gray-700 font-bold">{{$expense->title}}</div>
                <p class="mt-2 text-gray-600">{{$expense->description}}</p>
            </div>
            <div class="flex justify-between items-center mt-4">

                <a class="text-blue-600 hover:underline"
                   @if($expense->path!==null)
                    href="/{{$expense->id}}/private/{{$expense->path}}">See receipt</a>
                @endif


                @if (auth()->user()->id!==1)
                <a class="text-blue-600 hover:underline"
                   href="/expenses/{{$expense->id}}/edit">Edit</a>
                @endif
                {{-- @dd($image); --}}
                <div>
                    <div class="flex items-center">
                        {{-- <h2 class="text-black">{{$expense->path}}</h2> --}}
                        <h1 class="text-gray-700 font-bold">{{$expense->cost}}€</h1>
                    </div>
                </div>
            </div>
        </article>
    </div>
</x-app-layout>