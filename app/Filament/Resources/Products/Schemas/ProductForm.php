<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),

            TextInput::make('title')->required(),

            RichEditor::make('description')
                ->required()
                ->columnSpanFull(),

            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),

            TextInput::make('discount_price')
                ->numeric()
                ->nullable(),

            FileUpload::make('thumbnail')
                ->image()
                ->directory('products/thumbnails')
                ->disk('public')
                ->preserveFilenames()
                ->columnSpanFull(),

            Select::make('tags')
                ->multiple()
                ->relationship('tags', 'name')
                ->preload()
                ->searchable()
                ->columnSpanFull(),

            TextInput::make('demo_url')
                ->url()
                ->nullable(),

            Select::make('status')
            ->options([
                'draft' => 'Draft',
                'published' => 'Published',
                ])
                ->default('draft')
                ->required(),

            Toggle::make('product_up')
                ->label('Product Up')
                ->default(false),
            Toggle::make('for_bussinees')
                ->label('For bussinees')
                ->default(false),
        ]);
    }
}
