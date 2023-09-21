<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;



    protected static ?string $navigationIcon = 'heroicon-o-user';


    public static function getPluralLabel(): ?string
    {
        return __('general.admins');
    }

    public static function getLabel(): ?string
    {
        return __('general.admins');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('general.userName'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->alphaNum()
                    ->regex('/^[a-zA-Z\s.,!?\'"()]+$/')

                    ->maxLength(16),


                TextInput::make('password')
                    ->label(__('general.password'))
                    ->password()
                    ->same('passwordConfirmation')
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->minLength(8)
                    ->regex('/^(?=.*[A-Z])(?=.*[@#$%^&+=!])(?=.*\d).+$/')
                    ->helperText(__('general.passwordHint')),

                TextInput::make('passwordConfirmation')
                    ->label(__('general.passwordConfirmation'))
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                   ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('userName'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('general.createdAt'))
                    ->sortable()
                    ->dateTime()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

}
