<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Employee;
use Livewire\Attributes\Validate;

class EmployeeForm extends Form
{
    public ?Employee $employee;

    #[Validate('required|string|max:255')]
    public $first_name = '';

    #[Validate('required|string|max:255')]
    public $last_name = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate(['required', 'regex:/^(\+63|0)[0-9]{10}$/'])]
    public $phone = '';

    #[Validate('required|string|max:255')]
    public $job_title = '';

    #[Validate('required|exists:departments,id')]
    public $department_id = '';

    #[Validate('required|date')]
    public $date_of_birth = '';

    #[Validate('required|date')]
    public $hire_date = '';

    #[Validate('required|numeric|min:0')]
    public $salary = '';

    #[Validate('required|in:active,inactive,terminated,on_leave')]
    public $status = '';


    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->job_title = $employee->job_title;
        $this->department_id = $employee->department_id;
        $this->date_of_birth = $employee->date_of_birth;
        $this->hire_date = $employee->hire_date;
        $this->salary = $employee->salary;
        $this->status = $employee->status;
    }

    public function store()
    {
        $this->validate();

        Employee::create($this->all());

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        $this->employee->update(
            $this->all()
        );
    }
}
