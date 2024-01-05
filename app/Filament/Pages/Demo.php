<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use App\Models\User;

class Demo extends Page implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.demo';
 
    public static function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('name')->sortable(),
                // ...
            ])
            ->filters([
                SelectFilter::make('name')
                // ->multiple() // TOGGLE THIS LINE AND WATCH http://127.0.0.1:8000/clockwork/app
                ->options([
                    'draft' => 'Draft',
                    'reviewing' => 'Reviewing',
                    'published' => 'Published',
                ])
            ])
            ->defaultSort('name');
    }

}
