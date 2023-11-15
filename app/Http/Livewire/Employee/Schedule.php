<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use App\Models\Schedule as scheduleModel;
use Livewire\Component;
use App\Models\Department;

use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TimePicker;

class Schedule extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return scheduleModel::query()->where('employee_id', auth()->user()->employee->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('EMPLOYEE NAME')->formatStateUsing(function ($record) {
                return $record->employee->firstname . ' ' . $record->employee->lastname;
            }),
            TextColumn::make('scheduled_from')->label('SCHEDULED FROM')->formatStateUsing(function ($record) {
                return \Carbon\Carbon::parse($record->scheduled_from)->format('h:i A');
            }),
            TextColumn::make('scheduled_to')->label('SCHEDULED TO')->formatStateUsing(function ($record) {
                return \Carbon\Carbon::parse($record->scheduled_to)->format('h:i A');
            })
        ];
    }

    public function render()
    {
        return view('livewire.employee.schedule');
    }
}