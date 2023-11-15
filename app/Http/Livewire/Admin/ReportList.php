<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttendanceMonitoring;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Schedule;
use Carbon\Carbon;
use Closure;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

class ReportList extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    public $created_from;
    public $created_until;

    protected function getTableQuery(): Builder
    {
        return AttendanceMonitoring::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('created_at')->date()->label('LOG DATE'),
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


    protected function getTableHeaderActions()
    {
        return [

            // Action::make('export')->label('EXPORT EXCEL')->button()->color('success')->size('md')->icon('heroicon-o-printer')->action(
            //     function ($record) {
            //         dd($this->created_from);
            //     }
            // )
            ExportAction::make('export')->label('Export Report'),
        ];
    }

    // public function getTableBulkActions()
    // {
    //     return [
    //         ExportBulkAction::make('export')->label('Export Report')
    //     ];
    // }
    protected function getTableFilters(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from')->label('Date From')->reactive(),
                    DatePicker::make('created_until')->label('Date To')->reactive(),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }





    public function render()
    {
        return view('livewire.admin.report-list');
    }
}