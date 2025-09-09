<?php

namespace App\Filament\Resources\Vouchers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VoucherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                Select::make('type')
                    ->options(['public' => 'Public', 'private' => 'Private'])
                    ->default('public')
                    ->required(),
                TextInput::make('discount_value')
                    ->required()
                    ->numeric(),
                TextInput::make('usage_limit')
                    ->required()
                    ->numeric(),
                TextInput::make('qty')
                    ->required()
                    ->numeric(),
                TextInput::make('min_spend')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('start_date')
                    ->required(),
                DateTimePicker::make('exp_date')
                    ->required(),
            ]);
    }
}
