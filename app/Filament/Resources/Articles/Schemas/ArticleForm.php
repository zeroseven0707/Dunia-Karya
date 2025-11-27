<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('articles/images')
                    ->preserveFilenames(),
                Textarea::make('excerpt')
                    ->columnSpanFull(),
                RichEditor::make('content')
                ->required()
                ->columnSpanFull(),

                TextInput::make('seo_keywords')
                    ->label('SEO Keywords')
                    ->helperText('Pisahkan dengan koma, misal: desain, template, dunia karya')
                    ->columnSpanFull(),
                Textarea::make('seo_description')
                    ->label('SEO Meta Description')
                    ->rows(3)
                    ->columnSpanFull(),

                DatePicker::make('date'),
            ]);
    }
}
