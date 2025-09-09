<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                ->image()
                ->directory('banner')
                ->disk('public')
                ->preserveFilenames()
                ->columnSpanFull(),
                TextInput::make('alt')
                    ->required(),
                TextInput::make('url'),
            ]);
    }
}
