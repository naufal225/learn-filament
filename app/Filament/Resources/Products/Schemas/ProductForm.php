<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk')
                    ->description('Data Utama Produk')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Produk')
                                    ->placeholder('Contoh: Laptop Lenovo LOQ')
                                    ->helperText('Nama produk yang akan muncul')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('price')
                                    ->numeric()
                                    ->label('Harga Produk')
                                    ->placeholder('Contoh: 25000')
                                    ->helperText('Harga produk untuk tiap transaksi')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->required(),

                                 Select::make('supplier_id')
                                    ->label('Supplier')
                                    ->relationship('supplier', 'name')
                                    ->required()

                            ]),
                    ]),

                Section::make('Status Produk')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Status')
                            ->default(true)
                    ])
            ]);
    }
}
