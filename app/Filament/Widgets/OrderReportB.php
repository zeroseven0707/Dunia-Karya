<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Carbon\Carbon;

class OrderReportB extends ChartWidget
{
    protected ?string $heading = 'Order Chart';

    protected int|string|array $columnSpan = '1';

    protected function getFilters(): ?array
    {
        return [
            '7_days' => '7 Days',
            '30_days' => '30 Days',
            '1_year' => '1 Year',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter ?? '7_days';

        switch ($filter) {
            case '30_days':
                $start = Carbon::now()->subDays(29);
                $period = 30;
                $format = 'd M';
                break;
            case '1_year':
                $start = Carbon::now()->subYear();
                $period = 12; // 12 bulan
                $format = 'M Y';
                break;
            case '7_days':
            default:
                $start = Carbon::now()->subDays(6);
                $period = 7;
                $format = 'd M';
                break;
        }

        $labels = [];
        $data = [];

        if ($filter === '1_year') {
            for ($i = 0; $i < $period; $i++) {
                $date = Carbon::now()->subMonths($period - $i - 1);
                $labels[] = $date->format($format);
                $data[] = Order::whereYear('created_at', $date->year)
                               ->whereMonth('created_at', $date->month)
                               ->count();
            }
        } else {
            for ($i = 0; $i < $period; $i++) {
                $date = $start->copy()->addDays($i);
                $labels[] = $date->format($format);
                $data[] = Order::whereDate('created_at', $date)->count();
            }
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $data,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
