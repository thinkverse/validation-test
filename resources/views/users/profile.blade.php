<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(':user', ['user' => $user->name]) }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="flex flex-col space-y-4">
                        <li>
                            <div class=" text-gray-500">
                                {{ $user->name }}
                            </div>
                        </li>
                        <li>
                            <div class=" text-gray-500">
                                {{ $user->email }}
                            </div>
                        </li>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
