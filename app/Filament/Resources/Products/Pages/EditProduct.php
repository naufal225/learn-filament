<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->url(ProductResource::getIndexUrl())
                ->icon(Heroicon::ArrowLeft)
                ->label('Kembali')
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Edit Produk';
    }

    public function getRedirectUrl(): string
    {
        return ProductResource::getIndexUrl();
    }
}
