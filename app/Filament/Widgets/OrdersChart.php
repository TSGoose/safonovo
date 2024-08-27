<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrdersChart extends ChartWidget
{
    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '300px';

    private int $maxOrders = 0;

    protected function getData(): array
    {
        $dataCanceled = Trend::query(Order::query()->where('status', OrderStatus::CANCELED))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $dataCanceledDataset = $dataCanceled->map(fn (TrendValue $value) => $value->aggregate);

        $dataPending = Trend::query(Order::query()->where('status', OrderStatus::PENDING))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $dataPendingDataset = $dataPending->map(fn (TrendValue $value) => $value->aggregate);

        $dataCompleted = Trend::query(Order::query()->where('status', OrderStatus::COMPLETED))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $dataCompletedDataset = $dataCompleted->map(fn (TrendValue $value) => $value->aggregate);

        $dataProcessing = Trend::query(Order::query()->where('status', OrderStatus::PROCESSING))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $dataProcessingDataset = $dataProcessing->map(fn (TrendValue $value) => $value->aggregate);

        $this->maxOrders = max(
            $dataCanceledDataset->max(),
            $dataPendingDataset->max(),
            $dataCompletedDataset->max(),
            $dataProcessingDataset->max(),
        );

        return [
            'datasets' => [
                [
                    'label' => __('Pending Orders'),
                    'data' => $dataPendingDataset,
                    'backgroundColor' => 'rgba(255, 165, 0, 0.5)',
                    'borderColor' => 'rgba(255, 165, 0, 1)',
                    'fill' => false,
                    'tension' => 0.3,
                    'pointBackgroundColor' => 'rgba(255, 165, 0, 1)',
                ],
                [
                    'label' => __('Processing Orders'),
                    'data' => $dataProcessingDataset,
                    'backgroundColor' => 'rgba(11, 70, 143, 0.8)',
                    'borderColor' => 'rgba(11, 70, 143, 1)',
                    'fill' => false,
                    'tension' => 0.3,
                    'pointBackgroundColor' => 'rgba(11, 70, 143, 1)',
                ],
                [
                    'label' => __('Completed Orders'),
                    'data' => $dataCompletedDataset,
                    'backgroundColor' => 'rgba(31, 114, 30, 0.5)',
                    'borderColor' => 'rgba(31, 114, 30, 1)',
                    'fill' => false,
                    'tension' => 0.3,
                    'pointBackgroundColor' => 'rgba(31, 114, 30, 1)',
                ],
                [
                    'label' => __('Canceled Orders'),
                    'data' => $dataCanceledDataset,
                    'backgroundColor' => 'rgba(100, 2, 2, 0.5)',
                    'borderColor' => 'rgba(100, 2, 2, 1)',
                    'fill' => false,
                    'tension' => 0.3,
                    'pointBackgroundColor' => 'rgba(100, 2, 2, 1)',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array|\Filament\Support\RawJs|null
    {
        return [
            'scales' => [
                'y' => [
                    'min' => 0,
                    'max' => $this->maxOrders + round($this->maxOrders / 10),
                ],
            ],
        ];
    }

    public function getDescription(): ?string
    {
        return __('The number of orders');
    }

    public function getHeading(): ?string
    {
        return __('Orders');
    }
}
