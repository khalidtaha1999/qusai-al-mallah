<?php

namespace App\Filament\Pages;

use App\Models\AboutUs;
use Carbon\Carbon;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Support\Htmlable;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class AboutUsEdit extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
//    protected static ?string $title = __('general.aboutUs');

    protected static string $view = 'filament.pages.about-us-edit';

    public static function getNavigationLabel(): string
    {
        return __('general.aboutUs');
    }

    public function getTitle(): string|Htmlable
    {
        return __('general.aboutUs');
    }

    public function mount(): void
    {
        $aboutUs = AboutUs::first()?->toArray();
        $this->form->fill($aboutUs);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label(__('general.image'))->image()
                    ->directory('about-image')
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                            ->prepend(Carbon::now()->timestamp))->required(),

                TinyEditor::make('content_ar')->label(__('general.contentAr'))->required()->maxLength(2000),
                TinyEditor::make('content_en')->label(__('general.contentEn'))->required()->maxLength(2000),
                Fieldset::make(__('general.contactUs'))
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('email')
                                    ->label(__('general.email'))
                                    ->type('email')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('phone')
                                    ->label(__('general.phone'))
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('location')
                                    ->label(__('general.location'))
                                    ->required()
                                    ->maxLength(255),
                            ])
                    ])

            ])
            ->statePath('data');


    }


    protected function getFormActions(): array
    {
        return [
            CreateAction::make()
                ->action('save')
                ->label(__('general.save'))
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('User registered')
                        ->body('The user has been created successfully.')

                )
        ];
    }

    public function save(): void
    {
        $aboutUs = AboutUs::first();
        $data = $this->form->getState();
        if ($aboutUs) {
            $aboutUs->updateOrCreate(['id' => $aboutUs->id],
                $data
            );
        } else {
            AboutUs::create($data);
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
