<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\EventResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EventResource\RelationManagers;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $activeNavigationIcon = 'heroicon-s-ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Event Profile')
                    ->schema([

                        TextInput::make('name')->label('Event Name')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('date')
                            ->Label('Event Date')
                            ->displayFormat('l F d, Y')
                            ->required(),
                        Select::make('day_type')
                            ->label('Day Type')
                            ->required()
                            ->options([
                                '0ff' => 'Off',
                                'travel' => 'Travel',
                                'load_in' => 'Load In',
                                'show' => 'Show',
                            ]),
                        Select::make('venue_id')
                            ->label('Venue')
                            ->relationship('venue', 'name')
                            ->preload(),
                        TextInput::make('city')
                            ->label('City')
                            ->maxLength(255),
                        TextInput::make('country')
                            ->label('Country')
                            ->maxLength(255),
                    ])->columns(3)->collapsible(),

                Section::make('Local Contacts')
                    ->schema([
                        Select::make('Local Contacts')
                            ->label('Local Contacts')
                            ->multiple()
                            ->relationship('localcontacts', 'name')
                            ->preload(),

                    ])->collapsible(),

                    Section::make('Hotels')
                    ->schema([

                        Select::make('A Party Hotels')
                            ->label('A Party Hotels')
                            ->multiple()
                            ->relationship('aPartyHotels', 'name')
                            ->preload(),

                            Select::make('B Party Hotels')
                            ->label('B Party Hotels')
                            ->multiple()
                            ->relationship('bPartyHotels', 'name')
                            ->preload(),

                            Select::make('C Party Hotels')
                            ->label('C Party Hotels')
                            ->multiple()
                            ->relationship('cPartyHotels', 'name')
                            ->preload(),

                    ])->columns(3)->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('venue.name')
                    ->toggleable()->label('Venue')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('day_type')
                    ->label('Type')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('date')
                    ->label('Date')
                    ->dateTime('F d, Y')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('F d, Y / H:i')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Published')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(),
            ])
            ->filters([
                // TernaryFilter::make('is_active')->label('Active')->indicator('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\LocalContactsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
