<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Voucher;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = '1'; // Widget-nya ambil penuh (1 slot)

    protected function getColumns(): int|array
    {
        return 2; // di dalam widget ini semua stat card dibagi jadi 2 kolom
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->description('Jumlah semua buyer'),

            Stat::make('Total Products', Product::count())
                ->description('Jumlah semua produk'),

            Stat::make('Total Categories', Category::count())
                ->description('Jumlah semua kategori'),

            Stat::make('Total Vouchers', Voucher::count())
                ->description('Jumlah semua voucher'),

            Stat::make('Published Products', Product::where('status', 'published')->count())
                ->description('Produk yang sudah dipublikasikan'),

            Stat::make('Draft Products', Product::where('status', 'draft')->count())
                ->description('Produk dalam status draft'),
        ];
    }
}
