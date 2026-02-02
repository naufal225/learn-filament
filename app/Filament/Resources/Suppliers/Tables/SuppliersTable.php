<?php

namespace App\Filament\Resources\Suppliers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SuppliersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Supplier')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone_number')
                    ->label('No. Telepon')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('creator.name')->label('Dibuat oleh'),

                TextColumn::make('products_count')
                    ->label('Jumlah Produk')
                    ->counts('products')
                    ->badge()
                    ->color(fn($state) => $state > 0 ? 'success' : 'danger')
                    ->sortable()

            ])
            ->emptyStateHeading('Belum Ada Data')
            ->emptyStateDescription('Klik "Tambah Supplier" untuk Menambah Data')
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
