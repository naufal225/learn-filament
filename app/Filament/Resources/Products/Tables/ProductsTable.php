<?php

namespace App\Filament\Resources\Products\Tables;

use App\Filament\Exports\ProductExporter;
use App\Filament\Resources\Categories\Tables\CategoriesTable;
use App\Models\Category;
use App\Models\Product;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->prefix('IDR')
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('supplier.name')
                    ->label('Supplier')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('is_active')
                    ->label('Status')
                    ->icon(fn($state) => $state > 0 ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->color(fn($state) => $state > 0 ? 'success' : 'danger')
                    ->formatStateUsing(fn($state) => $state ? 'Aktif' : 'Non Aktif')
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),

                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->trueLabel('Aktif')
                    ->falseLabel('Non Aktif')
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // ExportAction::make('product_export')
                //     ->label('Export Produk')
                //     ->icon(Heroicon::OutlinedArrowDownTray)
                //     ->exporter(ProductExporter::class),

                ExportBulkAction::make('product_export')
                    ->label('Export Produk')
                    ->icon(Heroicon::OutlinedArrowDownTray)
                    ->exporter(ProductExporter::class),

                BulkActionGroup::make([

                    BulkAction::make('activate')
                        ->label('Aktifkan')
                        ->action(fn($records) => $records->each->update(['is_active' => true]))
                        ->color('success')
                        ->icon(Heroicon::OutlinedCheckCircle),

                    BulkAction::make('deactivate')
                        ->label('Non Aktifkan')
                        ->action(fn($records) => $records->each->update(['is_active' => false]))
                        ->color('danger')
                        ->icon(Heroicon::OutlinedXCircle),

                    DeleteBulkAction::make(),
                ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
            ]);
    }
}
