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
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Revenue calculations
        $currentMonthRevenue = \App\Models\Order::where('status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');
            
        $lastMonthRevenue = \App\Models\Order::where('status', 'paid')
            ->whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_price');
            
        $revenueTrend = $lastMonthRevenue > 0 
            ? (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 
            : 100;

        // Order calculations
        $currentMonthOrders = \App\Models\Order::where('status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->count();

        return [
            Stat::make('Total Revenue (This Month)', 'Rp ' . number_format($currentMonthRevenue, 0, ',', '.'))
                ->description($revenueTrend >= 0 ? number_format($revenueTrend, 1) . '% increase' : number_format(abs($revenueTrend), 1) . '% decrease')
                ->descriptionIcon($revenueTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueTrend >= 0 ? 'success' : 'danger')
                ->chart([7, 2, 10, 3, 15, 4, 17]), // Dummy chart for visual appeal, can be real data

            Stat::make('New Orders (This Month)', $currentMonthOrders)
                ->description('Paid orders')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),

            Stat::make('Total Customers', User::where('role', '!=', 'admin')->count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
                
            Stat::make('Active Products', Product::where('status', 'published')->count())
                ->description('Ready to sell')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
        ];
    }
}
