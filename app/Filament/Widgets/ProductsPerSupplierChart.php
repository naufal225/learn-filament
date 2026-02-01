<?php

namespace App\Filament\Widgets;

use App\Models\Supplier;
use Filament\Widgets\ChartWidget;

class ProductsPerSupplierChart extends ChartWidget
{
    protected ?string $heading = 'Products Per Supplier Chart';

    protected function getData(): array
    {
        $suppliers = Supplier::withCount('products')->get();
        $labels = $suppliers->pluck('name');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $suppliers->pluck('products_count'),
                    'backgroundColor' => $this->generateColorsFromLabels($labels),
                ]
            ],
            'labels' => $suppliers->pluck('name')
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    private function generateColorsFromLabels($labels)
    {
        return collect($labels)->map(function ($label) {
            $hash = crc32($label);

            return sprintf(
                'rgba(%d, %d, %d, 0.7)',
                ($hash & 0xFF0000) >> 16,
                ($hash & 0x00FF00) >> 8,
                $hash & 0x0000FF
            );
        })->toArray();
    }
}
