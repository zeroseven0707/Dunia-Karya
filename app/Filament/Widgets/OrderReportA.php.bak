<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;

class OrderReportA extends ChartWidget
{
    protected ?string $heading = 'Order Status';

    protected int|string|array $columnSpan = '1';

    // custom tinggi widget
    protected static ?string $contentHeight = '500px';

    protected function getData(): array
    {
        $statuses = ['pending', 'paid', 'cancelled', 'failed', 'expired'];

        $data = collect($statuses)->mapWithKeys(fn ($status) => [
            $status => Order::where('status', $status)->count(),
        ])->toArray();

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Order Status',
                    'data' => array_values($data),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'maintainAspectRatio' => false,
        ];
    }
}
