<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class CreateProduct extends CreateRecord
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
        return 'Tambah Produk';
    }

    public function getRedirectUrl(): string
    {
        return ProductResource::getIndexUrl();
    }

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction
        ];
    }
}
