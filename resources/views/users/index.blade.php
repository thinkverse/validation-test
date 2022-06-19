<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All users') }}
            </h2>

            <div class="flex items-center justify-end">
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Create user') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200 space-y-6">
                    <ul class="flex flex-col">
                        @foreach ($users as $user)
                        <li @class(['flex items-center justify-between text-sm py-4 px-6', 'bg-gray-50' => $loop->even])>
                            <div>
                                <p class="font-medium text-gray-900">
                                    {{ $user->name }}
                                </p>
                                <p class=" text-gray-500">
                                    {{ $user->email }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('users.show', $user) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('view') }}
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-10 px-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
