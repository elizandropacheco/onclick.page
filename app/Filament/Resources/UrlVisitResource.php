<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UrlVisitResource\Pages;
use App\Filament\Resources\UrlVisitResource\RelationManagers;
use App\Models\UrlVisit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UrlVisitResource extends Resource
{
    protected static ?string $model = UrlVisit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating_system')
                    ->searchable(),
                Tables\Columns\TextColumn::make('referer_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_agent')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('browser')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visited_at')
                    ->searchable(),
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
            'index' => Pages\ListUrlVisits::route('/'),
            'create' => Pages\CreateUrlVisit::route('/create'),
            'edit' => Pages\EditUrlVisit::route('/{record}/edit'),
        ];
    }
}
