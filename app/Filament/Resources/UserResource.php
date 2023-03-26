<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Actions\SendEmailBulkAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $activeNavigationIcon = 'heroicon-s-user-group';

    protected static ?string $navigationLabel = 'Crew Members';

    protected static ?string $navigationGroup = 'Directories';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Reuqired Information')
                    ->schema([
                        TextInput::make('name')->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('password')
                            ->password()
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                            ->minLength(8)
                            ->same('passwordConfirmation')
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                        TextInput::make('passwordConfirmation')
                            ->password()
                            ->label('Password Confirmation')
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                            ->minLength(8)
                            ->dehydrated(false),
                        Toggle::make('is_active')->label('Is Active')
                            ->onIcon('heroicon-s-lightning-bolt')
                            ->offIcon('heroicon-s-user')
                            ->onColor('success')
                            ->offColor('danger'),
                    ])->columns(4),

                Section::make('Roles and Permissions')
                    ->columns(2)
                    ->schema([

                        Select::make('roles')
                            ->label('Roles')
                            ->multiple()
                            ->preload()
                            ->relationship('roles', 'name'),
                        Select::make('permissions')
                            ->label('Permissions')
                            ->multiple()
                            ->preload()
                            ->relationship('permissions', 'name'),
                    ]),

                Section::make('Basic Profile')
                    ->columns(2)
                    ->schema([
                        TextInput::make('f_name')
                            ->Label('First Name')
                            ->maxLength(255),
                        TextInput::make('l_name')
                            ->Label('Last Name')
                            ->maxLength(255),
                        TextInput::make('alias')
                            ->Label('Goes By')
                            ->maxLength(255),
                        TextInput::make('title')
                            ->Label('Job Title')
                            ->maxLength(255),
                        Select::make('dept_id')
                            ->relationship('department', 'dept_name'),
                        Select::make('party_id')
                            ->relationship('party', 'party_name'),
                        TextInput::make('phone')
                            ->placeholder('+001 (555) 555-1212')
                            ->Label('Contact Number'),
                        TextInput::make('bus')
                            ->Label('Bus Number')
                            ->maxLength(255),
                        TextInput::make('cred')
                            ->Label('Credential Number')
                            ->maxLength(255),
                        TextInput::make('bag')
                            ->Label('Bag Tag')
                            ->maxLength(255),
                        DatePicker::make('dob')
                        ->displayFormat('l F d, Y')
                            ->Label('Date of Birth')
                    ])->collapsible(),

                Section::make('Administrative Notes')
                    ->schema([

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
                            ])->columnSpan(1),
                    ])
                    ->collapsible(),

                Section::make('Emergency Contact')
                    ->schema([
                        TextInput::make('e_name')
                            ->Label('Contact Name')
                            ->maxLength(255),
                        TextInput::make('e_relate')
                            ->Label('Relationship')
                            ->maxLength(255),
                        TextInput::make('e_email')
                            ->email()->Label('Email')
                            ->maxLength(255),
                        TextInput::make('e_phone')
                            ->placeholder('+001 (555) 555-1212')
                            ->Label('Phone'),
                    ])->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                    ->label('Full Name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('email')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('party.party_name')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('department.dept_name')
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

            ])->defaultSort('name', 'asc')
            ->filters([
                // SelectFilter::make('department')->relationship('department', 'dept_name'),
                // SelectFilter::make('party')->relationship('party', 'party_name'),
                TernaryFilter::make('is_active')->label('Active Member')->indicator('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // 
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
