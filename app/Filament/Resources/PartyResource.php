<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Party;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PartyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PartyResource\RelationManagers;

class PartyResource extends Resource
{
    protected static ?string $model = Party::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $activeNavigationIcon = 'heroicon-s-briefcase';
    
    protected static ?string $navigationGroup = 'System';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('party_name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('party_name')->sortable()->searchable(),
            TextColumn::make('created_at')->dateTime('F d, Y @ H:i'),
            TextColumn::make('updated_at')->dateTime('F d, Y @ H:i'),
        ])->defaultSort('party_name', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageParties::route('/'),
        ];
    }    
}
