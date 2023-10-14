<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnicalSystemResource\Pages;
use App\Filament\Resources\TechnicalSystemResource\RelationManagers;
use App\Models\TechnicalSystem;
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

class TechnicalSystemResource extends Resource
{
    protected static ?string $model = TechnicalSystem::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';


    public static function getPluralLabel(): ?string
    {
        return __('general.technicalSystems');
    }

    public static function getLabel(): ?string
    {
        return __('general.technicalSystems');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(1)
                    ->schema([
                        FileUpload::make('images')->label(__('general.image'))->image()
                            ->directory('technical_system')
                            ->multiple()
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
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('general.createdAt'))
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
            'index' => Pages\ListTechnicalSystems::route('/'),
            'create' => Pages\CreateTechnicalSystem::route('/create'),
            'edit' => Pages\EditTechnicalSystem::route('/{record}/edit'),
        ];
    }
}
