<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
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
                        FileUpload::make('image')->label(__('general.image'))->image()
                            ->directory('services')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend(Carbon::now()->timestamp))->required(),
                    ]),
                Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('title_ar')
                            ->label(__('general.titleAr'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_en')
                            ->label(__('general.titleEn'))
                            ->required()
                            ->maxLength(255),

                    ]),


                Grid::make()
                    ->schema([
                        Forms\Components\Textarea::make('content_ar')
                            ->label(__('general.contentAr'))
                            ->required()
                            ->maxLength(10050),
                        Forms\Components\Textarea::make('content_en')
                            ->label(__('general.contentEn'))
                            ->required()
                            ->maxLength(10050),

                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_en')
                    ->label(__('general.titleEn'))
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->label(__('general.titleAr'))
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
