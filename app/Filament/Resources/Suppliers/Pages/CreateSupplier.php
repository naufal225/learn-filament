<?php

namespace App\Filament\Resources\Suppliers\Pages;

use App\Filament\Resources\Suppliers\SupplierResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class CreateSupplier extends CreateRecord
{
    protected static string $resource = SupplierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->url(SupplierResource::getIndexUrl())
                ->icon(Heroicon::ArrowLeft)
                ->label('Kembali')
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Tambah Supplier';
    }

    public function getRedirectUrl(): string
    {
        return SupplierResource::getIndexUrl();
    }

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
        ];
    }
}
