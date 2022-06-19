<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(':user\'s Info', ['user' => $user->name]) }}
            </h2>

            <div class="flex items-center justify-end">
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('All users') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="flex flex-col space-y-4">
                        <li>
                            <div class="font-medium text-gray-900">
                                {{ __('Name') }}
                            </div>
                            <div class=" text-gray-500">
                                {{ $user->name }}
                            </div>
                        </li>
                        <li>
                            <div class="font-medium text-gray-900">
                                {{ __('Email') }}
                            </div>
                            <div class=" text-gray-500">
                                {{ $user->email }}
                            </div>
                        </li>
                        <li>
                            <div class="font-medium text-gray-900">
                                {{ __('Role') }}
                            </div>
                            <div class=" text-gray-500">
                                {{ str($user->role->value)->title }}
                            </div>
                        </li>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
