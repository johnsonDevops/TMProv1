<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Flight;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FlightResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FlightResource\RelationManagers;

class FlightResource extends Resource
{
    protected static ?string $model = Flight::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static ?string $activeNavigationIcon = 'heroicon-s-paper-airplane';

    protected static ?string $navigationGroup = 'Travel';

    protected static ?string $navigationLabel = 'Flight Itineraries';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Flight Itinerary Upload')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->preload(),
                        TextInput::make('flt_desc')
                            ->required(),
                        FileUpload::make('flt_file')
                            ->required()
                            ->directory('/travel')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(1024)
                            ->maxFiles(1)
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string) str($file->getClientOriginalName())->prepend('flight-itinerary-beyonce-');
                            })
                            ->enableDownload()
                            ->enableOpen(),
                    ])->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->toggleable()->label('Traveler')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('flt_desc')
                    ->toggleable()->label('Title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('updated_at')
                ->toggleable()
                ->sortable()
                ->searchable()
                ->dateTime('F d, Y'),
                ToggleColumn::make('is_active')
                    ->label('Published')
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable(),
            ])->defaultSort('user.name', 'asc')
            ->filters([
                SelectFilter::make('user')->relationship('user', 'name'),
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
            'index' => Pages\ListFlights::route('/'),
            'create' => Pages\CreateFlight::route('/create'),
            'edit' => Pages\EditFlight::route('/{record}/edit'),
        ];
    }
}
