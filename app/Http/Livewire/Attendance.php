<?php

namespace App\Http\Livewire;

use App\Models\AttendanceMonitoring;
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

class Attendance extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return AttendanceMonitoring::query()->orderBy('updated_at', 'DESC');
    }

    protected function getTableColumns(): array
    {
        return [

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

    public $rfid;
    public $employee_data = [];

    public function render()
    {
        return view('livewire.attendance', [
            'attendances' => AttendanceMonitoring::whereDate('created_at', now())->orderBy('updated_at', 'desc')->paginate(7),
        ]);
    }

    public function updatedRfid()
    {

        $this->employee_data = Employee::where('rfid_no', $this->rfid)->first();
        $employee_id = $this->employee_data->id;
        $schedule = Schedule::where('employee_id', $employee_id)->first();
        $time_in = $schedule->scheduled_from;
        $current_time = now()->format('H:i');
        $query = AttendanceMonitoring::where('employee_id', $employee_id)->whereDate('created_at', now())->count();

        $time = Carbon::parse($time_in)->format('H:i');

        if ($query < 1) {
            if ($current_time > $time) {
                AttendanceMonitoring::create([
                    'employee_id' => $employee_id,
                    'time_in' => now(),
                    'morning_status' => 'late',
                ]);
            } else {
                AttendanceMonitoring::create([
                    'employee_id' => $employee_id,
                    'time_in' => now(),
                    'morning_status' => 'on time',
                ]);
            }
        } else {
            dd('afternoon');
        }
    }
}