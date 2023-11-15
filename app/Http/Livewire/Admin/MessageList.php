<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\Message;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class MessageList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Message::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('fullname')->label('FULLNAME')->searchable(),
            TextColumn::make('email')->label('EMAIL')->searchable(),
            TextColumn::make('contact')->label('CONTACT NUMBER')->searchable(),
            TextColumn::make('message')->label('MESSAGE')->searchable(),

        ];
    }

    public function render()
    {
        return view('livewire.admin.message-list');
    }
}