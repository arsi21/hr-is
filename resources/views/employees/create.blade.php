<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto space-y-4 sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <livewire:employees.create />
            </div>
        </div>
    </div>
</x-app-layout>
