<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:flex sm:justify-around dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                {{-- We assuming that we have an admin user with an id of 1 this user cant make new expenses so we make visible the option to
                employees
                only--}}
                @if(auth()->user()->id!==1)
                {{-- "Add New" Expense Card --}}
                <div class="bg-red p-6 text-gray-900 dark:text-gray-100">

                    <a href="/expenses/create"
                       class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Add new expense</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here you can make a new expense</p>
                    </a>

                </div>
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- todo make the cards components --}}
                    {{-- "See Expenses" Card --}}
                    <a href="/expenses"
                       class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">See expenses</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here you can see and edit all your expenses</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>