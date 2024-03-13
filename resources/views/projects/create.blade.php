<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Upload Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-md">
            <form method="POST" action="{{ route('project.store') }}" class="p-4" enctype="multipart/form-data">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus  />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="project_url" :value="__('Project URL')" />
                    <x-text-input id="project_url" class="block mt-1 w-full" type="text" name="project_url" :value="old('project_url')" autofocus  />
                    <x-input-error :messages="$errors->get('project_url')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="project_description" :value="__('Project Description')" />
                    <x-text-input id="project_description" class="block mt-1 w-full" type="text" name="project_description" :value="old('project_description')" autofocus  />
                    <x-input-error :messages="$errors->get('project_description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
            <div class="mt-4">
                <x-input-label for="skill" :value="__('Skills')" />
                <select id="skill_id" class="block mt-1 w-full" name="skill_id[]" multiple>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('skills')" class="mt-2" />
            </div>


                <!-- Remember Me -->
          

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                       Create
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
