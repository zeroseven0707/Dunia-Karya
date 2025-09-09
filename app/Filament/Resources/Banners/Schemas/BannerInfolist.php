<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BannerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('path'),
                TextEntry::make('alt'),
                TextEntry::make('url'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
