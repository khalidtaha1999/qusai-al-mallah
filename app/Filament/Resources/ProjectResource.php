<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('image')->label(__('general.image'))->image()
                            ->directory('projects')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend(Carbon::now()->timestamp))->required()->maxSize(120)
                            ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire, Forms\Components\FileUpload $component) {
                                $livewire->validateOnly($component->getStatePath());
                            }),
                    ]),
                Grid::make()
                    ->schema([
                        Forms\Components\Textarea::make('title_en')->label(__('general.titleEn'))->required()->maxLength(255),

                        Forms\Components\Textarea::make('title_ar')->label(__('general.titleAr'))->required()->maxLength(255),

                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('status')
                            ->label(__('general.status'))
                            ->options([
                                '1' => __('general.published'),
                                '0' => __('general.unpublished'),
                            ])->required(),

                        TextInput::make('slug')->label(__('general.slug'))->required()->maxLength(35)->rules(['alpha_dash']),

                    ]),
                Grid::make(1)
                    ->schema([
                        TinyEditor::make('content_ar')->label(__('general.contentAr'))->required()->maxLength(10000)->minLength(200),
                    ]),

                Grid::make(1)
                    ->schema([
                        TinyEditor::make('content_en')->label(__('general.contentEn'))->required()->maxLength(10000)->minLength(200)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
