<?php

declare(strict_types=1);

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[ Layout('layouts::auth'), Title('Admin Forgot Password') ] class extends Component
{
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate();

        $user = Auth::getProvider()->retrieveByCredentials(['email' => $this->email]);

        if (! $user || $user->role !== UserRole::Admin) {
            throw ValidationException::withMessages([
                'email' => __('auth.not_admin'),
            ]);
        }

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link has been sent to your email address.'));
    }

    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
        ];
    }
};
