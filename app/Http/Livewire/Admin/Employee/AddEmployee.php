<?php

namespace App\Http\Livewire\Admin\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Livewire\WithFileUploads;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use DB;

class AddEmployee extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use WithFileUploads;
    public $attachment = [];
    public $firstname, $lastname, $middlename, $email, $employee_no, $rfid_no, $date_of_birth, $place_of_birth, $sex, $civil_status, $contact_no, $designation, $date_of_hire, $department, $complete_address, $username, $password;
    protected function getFormSchema(): array
    {
        return [

            Fieldset::make('PERSONAL INFORMATION')
                ->schema([
                    FileUpload::make('attachment')->required()->label('Photo'),
                    TextInput::make('employee_no')->label('Employee No.')->required(),
                    TextInput::make('rfid_no')->label('RFID Number')->required(),
                    TextInput::make('firstname')->label('First Name')->required(),
                    TextInput::make('middlename')->label('Middle Name'),
                    TextInput::make('lastname')->label('Last Name')->required(),
                    DatePicker::make('date_of_birth')->required(),
                    TextInput::make('place_of_birth')->label('Place of Bith')->required(),
                    Select::make('sex')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',

                        ]),
                    TextInput::make('civil_status')->label('Civil Status')->required(),
                    TextInput::make('contact_no')->label('Contact No.')->required(),
                    TextInput::make('email')->label('Email')->email()->required(),
                    TextInput::make('designation')->label('Designation')->required(),
                    DatePicker::make('date_of_hire')->required(),
                    Select::make('department')
                        ->options(Department::pluck('name', 'id')),
                    TextInput::make('complete_address')->label('Complete Address')->columnSpan(2),
                ])
                ->columns(3),
            Fieldset::make('PERSONAL ACCOUNT')
                ->schema([

                    TextInput::make('username')->label('Username')->required(),
                    TextInput::make('password')->label('Password')->password()->required(),

                ])
                ->columns(3)
        ];
    }

    public function submitRecord()
    {
        DB::beginTransaction();
        $user = User::create([
            'name' => $this->firstname . ' ' . $this->lastname,
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'is_admin' => false,
        ]);

        foreach ($this->attachment as $key => $item) {
            Employee::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'middlename' => $this->middlename,
                'email' => $this->email,
                'employee_no' => $this->employee_no,
                'rfid_no' => $this->rfid_no,
                'birthdate' => $this->date_of_birth,
                'birthplace' => $this->place_of_birth,
                'sex' => $this->sex,
                'civil_status' => $this->civil_status,
                'contact' => $this->contact_no,
                'designation' => $this->designation,
                'date_of_hire' => $this->date_of_hire,
                'department_id' => $this->department,
                'address' => $this->complete_address,
                'profile_path' => $item->store('Employee Photo', 'public'),
                'user_id' => $user->id,

            ]);
            DB::commit();
            sweetalert()->addSuccess('Employee Added');
            return redirect()->route('admin.employee-list');
        }

    }

    public function render()
    {
        return view('livewire.admin.employee.add-employee');
    }
}