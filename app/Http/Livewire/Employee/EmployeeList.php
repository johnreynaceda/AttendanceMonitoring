<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class EmployeeList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

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
            Tables\Actions\EditAction::make()->color('success')->icon('heroicon-o-pencil-alt'),
            Tables\Actions\DeleteAction::make(),
        ];
    }


    public function render()
    {
        return view('livewire.employee.employee-list');
    }
}