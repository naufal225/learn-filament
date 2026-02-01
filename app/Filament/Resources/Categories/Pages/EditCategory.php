<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class EditCategory extends EditRecord
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
        return 'Edit Kategori';
    }

    public function getRedirectUrl(): string
    {
        return CategoryResource::getIndexUrl();
    }
}
