<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\LocalContact;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LocalContactResource\Pages;
use App\Filament\Resources\LocalContactResource\RelationManagers;

class LocalContactResource extends Resource
{
    protected static ?string $model = LocalContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $activeNavigationIcon = 'heroicon-s-users';

    protected static ?string $navigationLabel = 'Local Contacts';

    protected static ?string $navigationGroup = 'Directories';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Local Contact Profile')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                            TextInput::make('company')
                            ->label('Company')
                            ->required()
                            ->maxLength(255),
                            TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->maxLength(255)
                            ->columns(2),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->maxLength(255),
                        Select::make('events')
                            ->label('Events Covered')
                            ->multiple()
                            ->relationship('events', 'name')
                            ->preload(),
                        RichEditor::make('notes')
                            ->Label('Notes')
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
                    ->label('Name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('company')
                    ->label('Company')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('F d, Y')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
            ])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLocalContacts::route('/'),
            'create' => Pages\CreateLocalContact::route('/create'),
            'edit' => Pages\EditLocalContact::route('/{record}/edit'),
        ];
    }
}
