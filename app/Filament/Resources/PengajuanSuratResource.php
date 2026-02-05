<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;
use App\Models\PengajuanSurat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengajuanSuratResource extends Resource
{
    protected static ?string $model = PengajuanSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_pengajuan')
                    ->required()
                    ->maxLength(20),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('penduduk_id')
                    ->relationship('penduduk', 'id')
                    ->required(),
                Forms\Components\Select::make('jenis_surat_id')
                    ->relationship('jenisSurat', 'id')
                    ->required(),
                Forms\Components\Textarea::make('keperluan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Textarea::make('catatan_admin')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('alasan_tolak')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('file_hasil')
                    ->maxLength(255),
                Forms\Components\TextInput::make('diproses_oleh')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('tanggal_selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_pengajuan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('penduduk.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenisSurat.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('file_hasil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diproses_oleh')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanSurats::route('/'),
            'create' => Pages\CreatePengajuanSurat::route('/create'),
            'edit' => Pages\EditPengajuanSurat::route('/{record}/edit'),
        ];
    }
}
