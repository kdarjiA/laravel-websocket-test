<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div>
                <div class="md:grid">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="title"
                                                   class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border border-red-500 @enderror">
                                            @error('name')
                                            <div class="text-red-700">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">
                                            Description
                                        </label>
                                        <div class="mt-1">
                                        <textarea id="description" name="description" rows="3"
                                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                        ></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 space-x-4">
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                    <a href="{{ route('tasks.index') }}"
                                       class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>


