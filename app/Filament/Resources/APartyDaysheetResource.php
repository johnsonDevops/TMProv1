<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\APartyDaysheet;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\APartyDaysheetResource\Pages;
use App\Filament\Resources\APartyDaysheetResource\RelationManagers;

class APartyDaysheetResource extends Resource
{
    protected static ?string $model = APartyDaysheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    protected static ?string $activeNavigationIcon = 'heroicon-s-clipboard-list';

    protected static ?string $navigationGroup = 'A Party';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --------------------------------------------------------------------
                Section::make('Daysheet Information')
                    ->schema([
                        Select::make('event_id')
                            ->relationship('event', 'date')
                            ->label('Event Date')
                            ->required()
                            ->preload(),
                        Select::make('day_type')
                            ->label('Day Type')
                            ->options([
                                'off' => 'Off',
                                'travel' => 'Travel',
                                'load_in' => 'Load In',
                                'show' => 'Show',
                                'rehearsals' => 'Rehearsals',
                            ]),
                        Select::make('hotel_id_1')
                            ->relationship('hotel1', 'name')
                            ->label('Hotel')
                            ->searchable()
                            ->placeholder('Primary hotel')
                            ->noSearchResultsMessage('No hotels found matching your search.')
                            ->preload(),
                        Select::make('hotel_id_2')
                            ->relationship('hotel2', 'name')
                            ->label('Hotel 2')
                            ->searchable()
                            ->placeholder('Secondary Hotel')
                            ->noSearchResultsMessage('No hotels found matching your search.')
                            ->preload(),
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
                    ])->columns(2)->collapsible(),
                // --------------------------------------------------------------------
                Section::make('Timeline')
                    ->schema([
                        Repeater::make('schedule')
                            ->schema([
                                TextInput::make('event_name'),
                                TimePicker::make('event_start_time'),
                                TimePicker::make('event_end_time'),
                            ])->columns(3),
                    ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event.date')
                    ->dateTime('F d, Y')
                    ->label('Date')
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('day_type')
                    ->toggleable()
                    ->label('Day Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('event.venue.name')
                    ->label('Venue')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')->label('Active')->indicator('Active'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAPartyDaysheets::route('/'),
            'create' => Pages\CreateAPartyDaysheet::route('/create'),
            'edit' => Pages\EditAPartyDaysheet::route('/{record}/edit'),
        ];
    }
}
