<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\APartyHotel;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\APartyHotelResource\Pages;
use App\Filament\Resources\APartyHotelResource\RelationManagers;

class APartyHotelResource extends Resource
{
    protected static ?string $model = APartyHotel::class;
    protected static ?string $navigationIcon = 'heroicon-o-office-building';
    protected static ?string $activeNavigationIcon = 'heroicon-s-office-building';
    protected static ?string $navigationGroup = 'A Party';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hotel Profile')
                    ->schema([
                        TextInput::make('name')->label('Hotel Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('addr_1')->label('Address')
                            ->maxLength(255),
                        TextInput::make('addr_2')->label('Address 2')
                            ->maxLength(255),
                        TextInput::make('city')->label('City')
                            ->maxLength(255),
                        TextInput::make('state')->label('state')
                            ->maxLength(255),
                        TextInput::make('zip')->label('Zip Code')
                            ->maxLength(255),
                        TextInput::make('country')->label('Country')
                            ->maxLength(255),
                        TextInput::make('url')->label('Hotel Website')
                            ->maxLength(255),
                        TextInput::make('poc_name')
                            ->label('Point of Contact Name')
                            ->maxLength(255),
                        TextInput::make('poc_phone')
                            ->label('Point of Contact Phone')
                            ->maxLength(255),
                        RichEditor::make('notes')
                            ->Label('Notes')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'undo',
                            ])->columnSpan('full'),
                    ])->columns(3)->collapsible(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->Label('Hotel Name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                    TextColumn::make('city')
                    ->Label('City')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                    TextColumn::make('state')
                    ->Label('State')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                    TextColumn::make('country')
                    ->Label('Country')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])->defaultSort('name', 'asc')
            ->filters([
                TernaryFilter::make('is_active')->label('Active')->indicator('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAPartyHotels::route('/'),
            'create' => Pages\CreateAPartyHotel::route('/create'),
            'edit' => Pages\EditAPartyHotel::route('/{record}/edit'),
        ];
    }
}
