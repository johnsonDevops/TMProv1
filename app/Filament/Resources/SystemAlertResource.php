<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\SystemAlert;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SystemAlertResource\Pages;
use App\Filament\Resources\SystemAlertResource\RelationManagers;

class SystemAlertResource extends Resource
{
    protected static ?string $model = SystemAlert::class;

    protected static ?string $navigationIcon = 'heroicon-o-speakerphone';
    protected static ?string $activeNavigationIcon = 'heroicon-s-speakerphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('body')
                    ->Label('Message')
                    ->toolbarButtons([
                        'bold',
                        'bulletList',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'undo',
                    ])->columnSpan(1),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->label('Message Title')
                ->sortable()
                ->toggleable()
                ->searchable(),
                TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime('F d, Y / H:i')
                ->sortable()
                ->toggleable()
                ->searchable(),
                ToggleColumn::make('is_active')
                ->label('Active')
                ->onIcon('heroicon-s-lightning-bolt')
                ->offIcon('heroicon-s-user')
                ->onColor('success')
                ->offColor('danger')
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSystemAlerts::route('/'),
        ];
    }    
}
