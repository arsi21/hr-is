<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="text-gray-900">
                <div class="flex justify-end mb-6">
                    <x-button primary label="New employee" href="{{ route('employees.create') }}" wire:navigate />
                </div>
                <livewire:employees.list-employees />
            </div>
        </div>
    </div>
</x-app-layout>
