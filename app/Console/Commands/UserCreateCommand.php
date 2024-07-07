<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PHPUnit\Framework\MockObject\Generator\DuplicateMethodException;

class UserCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria usuário com os parâmetros de nome, e-mail e senha.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            app(\App\Services\UserService::class)->store([
                'name' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => $this->argument('password')
            ]);

            $this->info('Usuário criado com sucesso!');
        } catch (DuplicateMethodException $e) {
            $this->error($e->getMessage());
        }
    }
}
