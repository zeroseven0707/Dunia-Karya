<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('id')->label('ID'),

            TextEntry::make('user.name')
                ->label('User'),

            TextEntry::make('category.name')
                ->label('Category'),

            TextEntry::make('title'),

            TextEntry::make('price')->money('idr'),

            TextEntry::make('discount_price')
            ->money('idr')
            ->default(0),

            ImageEntry::make('thumbnail')->label('Thumbnail'),

            TextEntry::make('demo_url')->url(fn ($record) => $record->demo_url, shouldOpenInNewTab: true),

            TextEntry::make('status'),

            TextEntry::make('created_at')->dateTime(),
            TextEntry::make('updated_at')->dateTime(),
        ]);
    }
}
