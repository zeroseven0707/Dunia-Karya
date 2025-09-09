<?php

namespace App\Filament\Resources\Vouchers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VoucherInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('code'),
                TextEntry::make('type'),
                TextEntry::make('discount_value')
                    ->numeric(),
                TextEntry::make('usage_limit')
                    ->numeric(),
                TextEntry::make('qty')
                    ->numeric(),
                TextEntry::make('min_spend')
                    ->numeric(),
                TextEntry::make('start_date')
                    ->dateTime(),
                TextEntry::make('exp_date')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
