<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Edit Skill
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-md">
            <form method="POST" action="{{ route('skill.update',$skill->id) }}" class="p-4" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <!-- Email Address -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$skill->name)" autofocus  />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
              

                <div class="mt-4">
                    <x-input-label for="rating" :value="__('Rating')" />
                    <x-text-input id="rating" class="block mt-1 w-full" type="number" name="rating" :value="old('rating',$skill->rating)" autofocus  />
                    <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="logo" :value="__('Logo')" />
                    <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>

                <!-- Remember Me -->
          

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                    Update
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
