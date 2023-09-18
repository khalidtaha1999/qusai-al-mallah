<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench';

    public static function getPluralLabel(): ?string
    {
        return __('general.services');
    }

    public static function getLabel(): ?string
    {
        return __('general.services');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(1)
                    ->schema([
                        FileUpload::make('image')
                            ->label(__('general.image'))
                            ->image()
                            ->required(),

                    ]),


                Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('general.title'))
                            ->required()
                            ->maxLength(255),

                    ]),



                Grid::make()
                    ->schema([
                        Forms\Components\Textarea::make('content_ar')
                            ->label(__('general.contentAr'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('content_en')
                            ->label(__('general.contentEn'))
                            ->required()
                            ->maxLength(255),

                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('general.title'))
                    ->wrap()
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
            ])->paginated([10]);
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
