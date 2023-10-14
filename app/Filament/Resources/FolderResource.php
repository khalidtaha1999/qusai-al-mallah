<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FolderResource\Pages;
use App\Filament\Resources\FolderResource\RelationManagers;
use App\Models\Folder;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FolderResource extends Resource
{
    protected static ?string $model = Folder::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';


    public static function getPluralLabel(): ?string
    {
        return __('general.categories');
    }

    public static function getLabel(): ?string
    {
        return __('general.categories');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label(__('general.image'))->image()
                    ->directory('category')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                            ->prepend(Carbon::now()->timestamp))->required()->maxSize(700)->image()
                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire, Forms\Components\FileUpload $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }),
                Forms\Components\TextInput::make('title_en')
                    ->label(__('general.titleEn'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ar')
                    ->label(__('general.titleAr'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label(__('general.image')),
                Tables\Columns\TextColumn::make('title_en')
                    ->label(__('general.titleEn'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')
                    ->label(__('general.titleAr'))
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
            'index' => Pages\ListFolders::route('/'),
            'create' => Pages\CreateFolder::route('/create'),
            'edit' => Pages\EditFolder::route('/{record}/edit'),
        ];
    }
}
