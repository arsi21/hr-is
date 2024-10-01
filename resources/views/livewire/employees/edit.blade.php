<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\EmployeeForm;
use App\Models\Department;
use App\Models\Employee;
use Filament\Notifications\Notification;

new class extends Component {

    public EmployeeForm $form;

    public function mount(Employee $employee)
    {
        $this->form->setEmployee($employee);
    }

    public function save()
    {
        $this->form->update();

        Notification::make()
            ->title('Saved')
            ->success()
            ->send();
    }

    public function delete($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();

        Notification::make()
            ->title('Deleted')
            ->success()
            ->send();

        $this->redirect(route('employees.index'), navigate: true);
    }

    public function with(): array
    {
        return [
            'departments' => Department::all(),
            'json_dept' => Department::all(),
        ];
    }
}; ?>

<div>
    <div class="flex justify-end mb-6">
        <x-button wire:click="delete({{ $form->employee->id }})" negative label="Delete" />
    </div>

    <form wire:submit='save'  class="space-y-4">
        <x-input wire:model='form.first_name' label='First Name' />
        <x-input wire:model='form.last_name' label='Last Name' />
        <x-input wire:model='form.phone' label="Phone Number" />
        <x-input wire:model='form.email' label='Email' type='email' />
        <x-input wire:model='form.job_title' label='Job Title' />
        <x-select
            wire:model='form.department_id'
            label="Department"
            placeholder="Select Department"
            :async-data="route('api.department.index')"
            option-label="name"
            option-value="id"
        />
        <x-input wire:model='form.date_of_birth' label='Date of Birth' type='date' />
        <x-input wire:model='form.hire_date' label='Hire Date' type='date' />
        <x-input wire:model='form.salary' label='Salary' type='number' />
        <x-select
            wire:model='form.status'
            label="Status"
            placeholder="Select Status"
            :options="[
                ['label' => 'Active', 'value' => 'active'],
                ['label' => 'Inactive', 'value' => 'inactive'],
                ['label' => 'Terminated', 'value' => 'terminated'],
                ['label' => 'On Leave', 'value' => 'on_leave'],
            ]"
            option-label="label"
            option-value="value"
        />

        <x-button type='submit' label='Save changes' spinner />
        <x-button flat secondary label="Cancel" href="{{ route('employees.index')}}" wire:navigate class="ml-2" />
    </form>
</div>
