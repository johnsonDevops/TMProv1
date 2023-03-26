<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Venue;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\VenueResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VenueResource\RelationManagers;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?string $activeNavigationIcon = 'heroicon-s-library';

    protected static ?string $navigationGroup = 'Directories';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Venue Profile')
                    ->schema([

                        TextInput::make('name')
                            ->Label('Venue')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('addr')
                            ->Label('Address')
                            ->maxLength(255),
                        TextInput::make('city')
                            ->Label('City')
                            ->maxLength(255),
                        TextInput::make('state')
                            ->Label('State')
                            ->maxLength(255),
                        TextInput::make('country')
                            ->Label('Country')
                            ->maxLength(255),
                        TextInput::make('zip')
                            ->Label('Zip Code')
                            ->maxLength(255),
                        TextInput::make('capacity')
                            ->Label('Capacity')
                            ->maxLength(255),
                        Select::make('type')
                            ->label('Venue Type')
                            ->options([
                                'stadium' => 'Stadium',
                                'arena' => 'Arena',
                                'amphitheater' => 'Amphitheater',
                                'theatre' => 'theatre',
                                'shed' => 'Shed',
                                'night_club' => 'Night Club',
                                'festival' => 'Festival',
                                'concert_hall' => 'Concert Hall',
                                'opera_house' => 'Opera House',
                            ]),
                        TextInput::make('url')
                            ->Label('Official URL')
                            ->maxLength(255),
                        TextInput::make('wiki')
                            ->Label('Wikipedia URL')
                            ->maxLength(255),
                        TextInput::make('dock_pin')
                            ->Label('Crew Entrance Pin')
                            ->placeholder('https://goo.gl/maps/9EoZe1t7jsvQ1V2p7')
                            ->maxLength(255),
                        FileUpload::make('evac')
                            ->Label('Evac Plan Image')
                            ->image()
                            ->maxSize(1024)
                            ->directory('/evac')
                            ->maxFiles(1)
                            ->enableDownload()
                            ->enableOpen()
                            ->columnSpan('full'),
                        RichEditor::make('notes')
                            ->Label('Venue Notes')
                            ->placeholder('Your notes here.')
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
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('city')
                    ->sortable()->searchable()
                    ->toggleable(),
                TextColumn::make('state')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('country')
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
            'index' => Pages\ListVenues::route('/'),
            'create' => Pages\CreateVenue::route('/create'),
            'edit' => Pages\EditVenue::route('/{record}/edit'),
        ];
    }    
}
