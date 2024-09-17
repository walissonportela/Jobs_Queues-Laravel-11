<?php

namespace App\Jobs;

use App\Mail\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobSendWelcomeEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Cria uma nova instãncia do job.
     */
    public function __construct(private $userId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Recuperar os dados do usuário 
        $user = User::find($this->userId);

        // Enviar o email de boas-vindas para o usuário
        Mail::to($user->email)
            ->later(now()->addMinute(), new SendWelcomeEmail($user));
    }
}
