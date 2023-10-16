<?php

namespace App\Filament\Pages;

use App\Models\AboutUs;
use App\Models\WhyChooseUs;
use Carbon\Carbon;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;


class WhyChooseUsEdit extends Page implements HasForms
{

    public ?array $data = [];


    public static function getNavigationLabel(): string
    {
        return __('general.whyChooseUs');
    }

    public function getTitle(): string|Htmlable
    {
        return __('general.whyChooseUs');
    }


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.why-choose-us-edit';

    public function mount(): void
    {
        $whyChooseUs = WhyChooseUs::first()?->toArray();
        $this->form->fill($whyChooseUs);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label(__('general.image'))->image()
                    ->directory('why-choose-us')
                    ->maxSize(200)
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file): string => (string)str($file->getClientOriginalName())
                            ->prepend(Carbon::now()->timestamp))->required(),
                Section::make(__('general.slider') . ' 1')->schema([
                    TinyEditor::make('sliders.slider1.content_ar')->label(__('general.contentAr'))->maxLength(2000)->minLength(50)->required(),
                    TinyEditor::make('sliders.slider1.content_en')->label(__('general.contentEn'))->maxLength(2000)->minLength(50)->required(),
                ]),
                Section::make(__('general.slider') . ' 2')->schema([
                    TinyEditor::make('sliders.slider2.content_ar')->label(__('general.contentAr'))->maxLength(2000)->minLength(50)->required(),
                    TinyEditor::make('sliders.slider2.content_en')->label(__('general.contentEn'))->maxLength(2000)->minLength(50)->required(),
                ]),
                Section::make(__('general.slider') . ' 3')->schema([
                    TinyEditor::make('sliders.slider3.content_ar')->label(__('general.contentAr'))->maxLength(2000)->minLength(50)->required(),
                    TinyEditor::make('sliders.slider3.content_en')->label(__('general.contentEn'))->maxLength(2000)->minLength(50)->required(),
                ]),
            ])
            ->statePath('data');
    }


    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $aboutUs = WhyChooseUs::first();
        $data = $this->form->getState();
        if ($aboutUs) {
            $aboutUs->updateOrCreate(['id' => $aboutUs->id],
                $data
            );
        } else {
            WhyChooseUs::create($data);
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
