<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsefulLinksResource\Pages;
use App\Filament\Resources\UsefulLinksResource\RelationManagers;
use App\Models\UsefulLinks;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsefulLinksResource extends Resource
{
    protected static ?string $model = UsefulLinks::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';


    public static function getPluralLabel(): ?string
    {
        return __('general.usefulLinks');
    }

    public static function getLabel(): ?string
    {
        return __('general.usefulLinks');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_en')
                    ->label(__('general.titleEn'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ar')->label(__('general.titleAr'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('link')
                    ->label(__('general.link'))
                    ->activeUrl()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label(__('general.titleEn'))->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->label(__('general.titleAr'))->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')->label(__('general.link'))
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')->label(__('general.createdAt'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
            'index' => Pages\ListUsefulLinks::route('/'),
            'create' => Pages\CreateUsefulLinks::route('/create'),
            'edit' => Pages\EditUsefulLinks::route('/{record}/edit'),
        ];
    }
}
