<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')->url(CategoryResource::getIndexUrl())
                ->icon(Heroicon::ArrowLeft)
                ->label('Kembali')
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return 'Tambah Kategori';
    }

    public function getRedirectUrl(): string
    {
        return CategoryResource::getIndexUrl();
    }

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction
        ];
    }
}
