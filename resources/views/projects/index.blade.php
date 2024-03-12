<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="flex justify-end m-2 p-2">
                <a href="{{route('project.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    New Project </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Project Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Project Link
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Project Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Skills
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$project->name}}
                </th>
                <td class="px-6 py-4">
                   {{$project->project_url}}
                </td>
                <td class="px-6 py-4">
                      {{$project->image}}
                </td>
                <td class="px-6 py-4">
                   {{$project->project_description}}
                </td>
                <td class="px-6 py-4">
                   {{$project->skill_id}}
                </td>
                <td class=" justify-start items-center px-6 py-4">
              
                <a href="{{ route('project.edit', $project->id) }}" class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                   <form method="POST" action="{{ route('project.destroy', $project->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                   </form>
                
                </td>
            </tr>
            @empty
            <tr>
                <td>
                      <h2>No Projects</h2>
                </td>
            </tr>
              
            @endforelse
      

        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

