<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Edit Expense') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("All fields can be changed") }}
        </p>
    </header>


    <form method="post"
          {{--
          pass
          the
          expense's
          id
          for
          the
          route
          --}}
          action="{{ route('expense.update',$expense->id) }}"
          enctype="multipart/form-data"
          class="mt-6 space-y-6">
        @csrf
        @method('patch')


        <div>
            <x-input-label for="date"
                           :value="__('Date*')" />
            <x-text-input id="date"
                          name="date"
                          type="date"
                          class="mt-1 block w-full"
                          :value="old('date',$expense->date)"
                          required
                          autofocus
                          {{--
                          autocomplete="name"
                          --}} />
            <x-input-error class="mt-2"
                           :messages="$errors->get('date')" />
        </div>

        <div>
            <x-input-label for="category"
                           :value="__('Category*')" />
            <x-text-input id="category"
                          name="category"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('category',$expense->category)"
                          required
                          autofocus
                          {{--
                          autocomplete="name"
                          --}} />
            <x-input-error class="mt-2"
                           :messages="$errors->get('category')" />
        </div>

        <div>
            <x-input-label for="title"
                           :value="__('Title*')" />
            <x-text-input id="title"
                          name="title"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('title',$expense->title)"
                          required
                          autofocus
                          {{--
                          autocomplete="name"
                          --}} />
            <x-input-error class="mt-2"
                           :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="description"
                           :value="__('Description')" />
            <x-text-input id="description"
                          name="description"
                          type="text"
                          class="mt-1 block w-full"
                          :value="old('description',$expense->description)"
                          autofocus
                          {{--
                          autocomplete="name"
                          --}} />
            <x-input-error class="mt-2"
                           :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="cost"
                           :value="__('Cost*')" />
            <x-text-input id="cost"
                          name="cost"
                          type="number"
                          step=".01"
                          class="mt-1 block w-full"
                          :value="old('cost',$expense->cost)"
                          required
                          autofocus
                          {{--
                          autocomplete="name"
                          --}} />
            <x-input-error class="mt-2"
                           :messages="$errors->get('cost')" />

            <input type="file"
                   name="image"
                   id="inputImage"
                   class="form-control"
                   :value="old('image')">

            <x-input-error class="mt-2"
                           :messages="$errors->get('image')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }"
               x-show="show"
               x-transition
               x-init="setTimeout(() => show = false, 2000)"
               class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>