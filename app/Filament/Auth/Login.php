<?php

namespace App\Filament\Auth;


use Filament\Pages\Auth\Login as BaseAuth;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Illuminate\Validation\ValidationException;

class Login extends BaseAuth
{


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getLoginFormComponent(),
                $this->getPasswordFormComponent(),
            ])
            ->statePath('data');
    }


    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
            ->label(__('general.userName'))
            ->required()
            ->autocomplete()
            ->autofocus();
    }


    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = 'name';

        return [
            $login_type => $data['login'],
            'password' => $data['password'],
        ];
    }


    /**
     * @throws ValidationException
     */
    public function authenticate(): \Filament\Http\Responses\Auth\Contracts\LoginResponse
    {
        try {
            return parent::authenticate();
        } catch (ValidationException) {
            throw ValidationException::withMessages([
                'data.login' => __('filament-panels::pages/auth/login.messages.failed'),
            ]);
        }
    }

}
