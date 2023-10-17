<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
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
use Illuminate\Support\Facades\Config;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getPluralLabel(): ?string
    {
        return __('general.files');
    }

    public static function getLabel(): ?string
    {
        return __('general.files');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('file')->label(__('general.image'))
                            ->label(__('general.file'))
                            ->directory('file')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend(Carbon::now()->timestamp))->required()->acceptedFileTypes(['application/pdf'])
                            ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire, Forms\Components\FileUpload $component) {
                                $livewire->validateOnly($component->getStatePath());
                            }),
                    ]),

                Forms\Components\Select::make('folder_id')
                    ->label(__('general.categories'))
                    ->required()
                    ->relationship('folder', 'title_' . Config::get('app.locale')),

                Forms\Components\TextInput::make('title_en')
                    ->label(__('general.titleEn'))
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('title_ar')
                    ->label(__('general.titleAr'))
                    ->required()
                    ->maxLength(100),


                Grid::make()
                    ->schema([
                        Forms\Components\Textarea::make('description_ar')
                            ->label(__('general.contentAr'))
                            ->required()
                            ->maxLength(10050),
                        Forms\Components\Textarea::make('description_en')
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
                Tables\Columns\TextColumn::make('folder.title_' . Config::get('app.locale'))
                    ->label(__('general.category'))
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
