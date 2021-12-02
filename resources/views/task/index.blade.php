<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
                <div class="font-medium text-sm text-green-600 bg-green-100 p-4 mb-4">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="lg:flex lg:items-center lg:justify-end pb-4">


                <span class="sm:ml-3">

                    <a href="{{ route('tasks.create') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
         aria-hidden="true">
      <path fill-rule="evenodd"
            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
            clip-rule="evenodd"/>
    </svg>
      Add New Task
                    </a>
</span>

            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created Date
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 task-list-container">
                    @foreach($tasks as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        {!! $task->name !!}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{!! \Illuminate\Support\Str::limit($task->description,50,'...') !!}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {!! \Carbon\Carbon::make($task->created_at)->format("Y-m-d") !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        Echo.private('task')
            .listen('.task.created', (e) => {
                console.log('yess');
                console.log(e.task);
                let description = e.task.description;
                let task_created_date = e.task.created_at;
                let created_date = task_created_date.split("T");
                var row_html = '<tr><td class="px-6 py-4 whitespace-nowrap"><div class="flex items-center"><div class="text-sm font-medium text-gray-900">';
                row_html += e.task.name + '</div></div></td>';
                row_html += '<td class="px-6 py-4 whitespace-nowrap"><div class="text-sm text-gray-500">';
                row_html += description.substr(0, 50)+'...</div></td>';
                row_html += '<td class="px-6 py-4 whitespace-nowrap">' + created_date[0] + '</td></tr>';
                $(".task-list-container").prepend(row_html);
            });
    </script>
</x-app-layout>
