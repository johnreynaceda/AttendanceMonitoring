<?php

namespace App\Http\Livewire\Employee;

use App\Models\Department;
use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Livewire\WithFileUploads;


class EmployeeList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;
    public $edit_modal = false;

    protected function getTableQuery(): Builder
    {
        return Employee::query();
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('photo')->label('PHOTO')->view('admin.employee.filament.photo'),
            TextColumn::make('rfid_no')->label('RFID NUMBER')->searchable(),
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->firstname . ' ' . $record->lastname;
            }),
            TextColumn::make('contact')->label('CONTACT NUMBER')->searchable(),
            TextColumn::make('designation')->label('DESIGNATION')->searchable(),
            TextColumn::make('department.name')->label('DEPARTMENT')->searchable(),
            TextColumn::make('date_of_hire')->date()->label('DATE HIRE')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()->color('success')->icon('heroicon-o-pencil-alt')->action(
                function ($record, $data) {
                    $record->update($data);
                    sweetalert()->addSuccess('Employee Updated');
                }
            )->form(
                    function ($record) {
                        return [
                            Fieldset::make('PERSONAL INFORMATION')
                                ->schema([
                                    TextInput::make('employee_no')->label('Employee No.')->required(),
                                    TextInput::make('rfid_no')->label('RFID Number')->required(),
                                    TextInput::make('firstname')->label('First Name')->required(),
                                    TextInput::make('middlename')->label('Middle Name'),
                                    TextInput::make('lastname')->label('Last Name')->required(),
                                    DatePicker::make('birthdate')->required(),
                                    TextInput::make('birthplace')->label('Place of Bith')->required(),
                                    Select::make('sex')
                                        ->options([
                                            'Male' => 'Male',
                                            'Female' => 'Female',

                                        ]),
                                    TextInput::make('civil_status')->label('Civil Status')->required(),
                                    TextInput::make('contact')->label('Contact No.')->required(),
                                    TextInput::make('email')->label('Email')->email()->required(),
                                    TextInput::make('designation')->label('Designation')->required(),
                                    DatePicker::make('date_of_hire')->required(),
                                    Select::make('department_id')
                                        ->options(Department::pluck('name', 'id')),
                                    TextInput::make('address')->label('Complete Address')->columnSpan(2),
                                ])
                                ->columns(3),

                        ];
                    }
                )->modalWidth('5xl'),
            Tables\Actions\DeleteAction::make(),
        ];
    }


    public function render()
    {
        return view('livewire.employee.employee-list');
    }
}
