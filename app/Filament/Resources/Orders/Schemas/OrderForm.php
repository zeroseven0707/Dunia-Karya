<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->default(fn () => Auth::id())
                    ->hidden(),

                TextInput::make('total_price')
                    ->required()
                    ->numeric(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                        'failed' => 'Failed',
                        'expired' => 'Expired',
                    ])
                    ->default('pending')
                    ->required(),

                TextInput::make('payment_method')
                    ->required(),

                TextInput::make('payment_ref')
                    ->required(),

                DateTimePicker::make('paid_at'),

                DateTimePicker::make('expires_at'),

                Repeater::make('items')
                    ->relationship('items')
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->options(Product::all()->pluck('name', 'id'))
                            ->required(),
                        TextInput::make('qty')
                            ->numeric()
                            ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(3)
                    ->minItems(1)
                    ->createItemButtonLabel('Add Item'),
            ]);
    }
}
