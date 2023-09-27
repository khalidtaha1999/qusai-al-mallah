<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class BlogResource extends Resource
{

    public static string $name = 'Blogs';

    // Change the title of the resource

    protected static ?string $model = Blog::class;


    public static function getPluralLabel(): ?string
    {
        return __('general.blog');
    }

    public static function getLabel(): ?string
    {
        return __('general.blog');
    }

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('image')->label(__('general.image'))->image()
                            ->directory('blogs')
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
                Grid::make()
                    ->schema([
                        Forms\Components\Textarea::make('brief_en')->label(__('general.briefEn'))->required()->maxLength(255),
                        Forms\Components\Textarea::make('brief_ar')->label(__('general.briefAr'))->required()->maxLength(255),

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
                TextColumn::make('title_en')->label(__('general.titleEn'))->searchable()->wrap(),
                TextColumn::make('title_ar')->label(__('general.titleAr'))->searchable()->wrap(),
                TextColumn::make('slug')->label(__('general.slug'))->searchable()->wrap(),
                IconColumn::make('status')
                    ->label(__('general.published'))
                    ->boolean(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
