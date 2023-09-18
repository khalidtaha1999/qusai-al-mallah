<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
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
                        FileUpload::make('image')->label(__('general.image'))->required(),

                    ]),
                Grid::make()
                    ->schema([
                        TextInput::make('title')->label(__('general.title'))->required(),
                        TextInput::make('slug')->label(__('general.slug'))->required(),

                    ]),

                Grid::make(1)
                    ->schema([
                        Select::make('status')
                            ->label(__('general.status'))
                            ->options([
                                '1' => __('general.published'),
                                '0' => __('general.unpublished'),
                            ])->required(),
                    ]),
                Grid::make(1)
                    ->schema([
                        RichEditor::make('content_ar')->label(__('general.contentAr'))->required()->toolbarButtons([
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'undo',
                        ]),
                    ]),

                Grid::make(1)
                    ->schema([
                        RichEditor::make('content_en')->label(__('general.contentEn'))->required()->toolbarButtons([
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'undo',
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label(__('general.title'))->searchable()->wrap(),
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
