<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Supplier')
                    ->description('Data Utama Supplier')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Supplier')
                                    ->placeholder('Contoh: Supplier ABC')
                                    ->helperText('Nama supplier untuk produk')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->email()
                                    ->label('Email Supplier')
                                    ->placeholder('Contoh: supplier123@example.com')
                                    ->required(),
                            ]),

                        TextInput::make('phone_number')
                            ->numeric()
                            ->label('No. Telepon')
                            ->required(),

                        Textarea::make('address')
                            ->label('Alamat Supplier')
                            ->maxLength(500)
                            ->required()
                    ]),


            ]);
    }
}
