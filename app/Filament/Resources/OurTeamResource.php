<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurTeamResource\Pages;
use App\Filament\Resources\OurTeamResource\RelationManagers;
use App\Models\OurTeam;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class OurTeamResource extends Resource
{
    protected static ?string $model = OurTeam::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getPluralLabel(): ?string
    {
        return __('general.ourTeam');
    }

    public static function getLabel(): ?string
    {
        return __('general.ourTeam');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        FileUpload::make('image')->label(__('general.image'))->image()
                            ->directory('our_team')
                            ->getUploadedFileNameForStorageUsing(
                                fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                                    ->prepend(Carbon::now()->timestamp))->required(),
                    ]),
                Grid::make()
                    ->schema([
                        TextInput::make('name_ar')->label(__('general.nameAr'))->required()->maxLength(255)->alpha(),
                        TextInput::make('name_en')->label(__('general.nameEn'))->required()->maxLength(255)->alpha(),
                        TextInput::make('position')->label(__('general.position'))->nullable()->maxLength(255)->alpha(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label(__('general.nameEn'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_ar')
                    ->label(__('general.nameAr'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->label(__('general.position'))
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
            'index' => Pages\ListOurTeams::route('/'),
            'create' => Pages\CreateOurTeam::route('/create'),
            'edit' => Pages\EditOurTeam::route('/{record}/edit'),
        ];
    }
}
