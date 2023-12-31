<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AllianceResource\Pages;
use App\Filament\Resources\AllianceResource\RelationManagers;
use App\Models\Alliance;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class AllianceResource extends Resource
{
    protected static ?string $model = Alliance::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';


    public static function getPluralLabel(): ?string
    {
        return __('general.alliances');
    }

    public static function getLabel(): ?string
    {
        return __('general.alliances');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('image')->label(__('general.image'))->image()
                            ->directory('alliance')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend(Carbon::now()->timestamp))->required(),
                    ]),
                Forms\Components\TextInput::make('title_ar')
                    ->label(__('general.titleAr'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->label(__('general.titleEn'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_ar')
                    ->label(__('general.titleAr'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')
                    ->label(__('general.titleEn'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')->label(__('general.image')),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__('general.createdAt'))
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
            'index' => Pages\ListAlliances::route('/'),
            'create' => Pages\CreateAlliance::route('/create'),
            'edit' => Pages\EditAlliance::route('/{record}/edit'),
        ];
    }
}
