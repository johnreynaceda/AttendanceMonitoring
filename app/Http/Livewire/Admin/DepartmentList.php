<?php

namespace App\Http\Livewire\Admin;

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

class DepartmentList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Department::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label('NAME'),
            TextColumn::make('description')->label('DESCRIPTION'),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_course')->label('Add Department')->button()->icon('heroicon-o-plus')->action(
                function ($record, $data) {
                    Department::create([
                        'name' => $data['name'],
                        'description' => $data['description'],
                    ]);
                    sweetalert()->addSuccess('Department Added');
                }
            )->form(
                    [
                        Fieldset::make('DEPARTMENT INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('description')->required(),
                            ])
                            ->columns(1)
                    ]
                )->modalWidth('2xl')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make()->color('success')->icon('heroicon-o-pencil-alt')->action(
                function ($record, $data) {
                    $record->update([
                        'name' => $data['name'],
                        'description' => $data['description'],
                    ]);
                    sweetalert()->addSuccess('Department Updated');
                }
            )->form(
                    [
                        Fieldset::make('DEPARTMENT INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('description')->required(),
                            ])
                            ->columns(1)
                    ]
                )->modalWidth('2xl'),
            Tables\Actions\DeleteAction::make(),
        ];
    }
    public function render()
    {
        return view('livewire.admin.department-list');
    }
}