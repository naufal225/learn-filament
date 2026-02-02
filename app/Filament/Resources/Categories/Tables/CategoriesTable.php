<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(components: [
                TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('creator.name')->label('Dibuat oleh'),

                TextColumn::make('products_count')
                    ->label('Jumlah Produk')
                    ->counts('products')
                    ->badge()
                    ->color(fn($state) => $state > 0 ? 'success' : 'gray')
                    ->sortable()
            ])
            ->emptyStateHeading('Belum Ada Data')
            ->emptyStateDescription('Klik "Tambah Kategori" untuk Menambah Data')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->visible(fn() => auth()->user()?->role === 'admin'),
                DeleteAction::make()->visible(fn() => auth()->user()?->role === 'admin')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->visible(fn() => auth()->user()?->role === 'admin'),
                ]),
            ]);
    }
}
