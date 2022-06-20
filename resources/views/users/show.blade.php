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
                    <dl class="grid grid-cols-3 grid-rows-2 gap-6">
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Name') }}</p>
                                    </dt>
                                    <dd class="mt-1 text-gray-500">
                                        <p>{{ $user->name }}</p>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Username') }}</p>
                                    </dt>
                                    <dd class="mt-1 text-gray-500">
                                        <p>{{ $user->username }}</p>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Email') }}</p>
                                    </dt>
                                    <dd class="mt-1 text-gray-500">
                                        <p>{{ $user->email }}</p>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Role') }}</p>
                                    </dt>
                                    <dd class="mt-1 text-gray-500">
                                        <p>{{ str($user->role->value)->title }}</p>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Member since') }}</p>
                                    </dt>
                                    <dd>
                                        <time datetime="{{ $user->created_at->toISOString() }}" class="mt-1 text-gray-500">
                                            {{ $user->created_at->format('d.m.Y / h:m:s') }}
                                        </time>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="flex flex-col">
                                <div class="flex-1">
                                    <dt class="text-gray-900 font-semibold text-xl">
                                        <p>{{ __('Last updated') }}</p>
                                    </dt>
                                    <dd>
                                        <time datetime="{{ $user->updated_at->toISOString() }}" class="mt-1 text-gray-500">
                                            {{ $user->updated_at->format('d.m.Y / h:m:s') }}
                                        </time>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>

            <ul class="flex justify-end gap-4 p-6">
                <li>
                    <a href="{{ route('users.profile', $user) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Edit') }}
                    </a>
                </li>
                <li>
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Delete') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
