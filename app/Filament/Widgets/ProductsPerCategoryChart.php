<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;
use PhpParser\Node\Stmt\Label;

class ProductsPerCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Produk per Kategori';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();
        $labels = $categories->pluck('name');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $categories->pluck('products_count'),
                    'backgroundColor' => $this->generateColorsFromLabels($labels),
                ]
            ],
            'labels' => $categories->pluck('name')
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    private function generateColorsFromLabels($labels) {
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
