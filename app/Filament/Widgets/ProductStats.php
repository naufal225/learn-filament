<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('total_product', Product::count())
                ->label('Jumlah Produk')
                ->icon(Heroicon::OutlinedCube)
                ->color('primary'),

            Stat::make('product_active', Product::where('is_active', '>', 0)->count())
                ->label('Produk Aktif')
                ->icon(Heroicon::OutlinedCheckCircle)
                ->color('success'),

            Stat::make('total_nonactive', Product::where('is_active', '==', 0)->count())
                ->label('Produk Non Aktif')
                ->icon(Heroicon::OutlinedXCircle)
                ->color('danger'),
        ];
    }
}
