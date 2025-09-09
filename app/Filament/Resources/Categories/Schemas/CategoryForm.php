<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use App\Models\Category;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(function () {
                        return Category::pluck('name', 'id');
                    })
                    ->searchable()
                    ->nullable(),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
