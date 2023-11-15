<?php

namespace App\Http\Livewire;

use App\Models\AttendanceMonitoring;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\BadgeColumn;

class AdminDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return AttendanceMonitoring::query()->whereDate('created_at', now());
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('photo')->label('PHOTO')->view('admin.filament-employee'),
            TextColumn::make('employee.rfid_no')->label('RFID'),
            TextColumn::make('fullname')->label('FULLNAME')->formatStateUsing(function ($record) {
                return $record->employee->firstname . ' ' . $record->employee->lastname;
            }),
            TextColumn::make('time_in')->label('TIME IN')->formatStateUsing(
                function ($record) {
                    return Carbon::parse($record->time_in)->format('h:i A');
                }
            ),
            BadgeColumn::make('morning_status')->label('MORNING STATUS')
                ->enum([
                    'late' => 'Late',
                    'on time' => 'On Time',
                ])->colors([
                        'danger' => 'late',
                        'success' => 'on time',
                    ]),
            TextColumn::make('time_out')->label('TIME OUT')->formatStateUsing(
                function ($record) {
                    return $record->time_out == null ? '' : Carbon::parse($record->time_in)->format('h:i A');
                }
            ),
            BadgeColumn::make('afternoon_status')->label('AFTERNOON STATUS')
                ->enum([
                    'late' => 'Late',
                    'on time' => 'On Time',
                ])->colors([
                        'danger' => 'late',
                        'success' => 'on time',
                    ]),


        ];
    }

    public function render()
    {
        return view('livewire.admin-dashboard', [
            'department' => Department::count(),
            'employee' => Employee::count(),
            'attendance' => AttendanceMonitoring::whereDate('created_at', now())->count(),

        ]);
    }
}