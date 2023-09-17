<?php

namespace App\Filament\Pages;

use App\Models\AboutUs;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Support\Htmlable;

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
        $aboutUs=AboutUs::first()?->toArray();
        $this->form->fill($aboutUs);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label(__('general.image'))->required(),
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
            ])
            ->statePath('data');
    }


    protected function getFormActions(): array
    {
        return [
            CreateAction::make()
                ->action('save')
                ->label('حفظ')
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
            $aboutUs->updateOrCreate(['id'=>$aboutUs->id],
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
