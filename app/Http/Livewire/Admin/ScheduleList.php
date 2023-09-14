<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\Schedule;
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

class ScheduleList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Schedule::query();
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

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()->color('success')->icon('heroicon-o-pencil-alt')->action(
                function ($record, $data) {
                    $record->update([
                        'employee_id' => $data['employee_id'],
                        'scheduled_from' => $data['scheduled_from'],
                        'scheduled_to' => $data['scheduled_to'],
                    ]);
                    sweetalert()->addSuccess('Schedule Updated');
                }
            )->form(
                    [
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(Employee::all()->mapWithKeys(function ($record) {
                                return [$record->id => $record->firstname . ' ' . $record->lastname];
                            }))
                            ->searchable(),
                        Grid::make(2)
                            ->schema([
                                TimePicker::make('scheduled_from')->withoutSeconds(),
                                TimePicker::make('scheduled_to')->withoutSeconds(),
                            ])
                    ]
                )->modalWidth('2xl'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_schedule')->label('Add Schedule')->button()->icon('heroicon-o-plus')->action(
                function ($record, $data) {

                    Schedule::create([
                        'employee_id' => $data['employee'],
                        'scheduled_from' => $data['scheduled_from'],
                        'scheduled_to' => $data['scheduled_to'],
                    ]);
                    sweetalert()->addSuccess('Schedule Added');
                }
            )->form(
                    [
                        Select::make('employee')
                            ->label('Employee')
                            ->options(Employee::all()->mapWithKeys(function ($record) {
                                return [$record->id => $record->firstname . ' ' . $record->lastname];
                            }))
                            ->searchable(),
                        Grid::make(2)
                            ->schema([
                                TimePicker::make('scheduled_from')->withoutSeconds(),
                                TimePicker::make('scheduled_to')->withoutSeconds(),
                            ])
                    ]
                )->modalWidth('2xl')
        ];
    }

    public function render()
    {
        return view('livewire.admin.schedule-list');
    }
}