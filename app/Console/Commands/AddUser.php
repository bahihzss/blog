<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add {name : Enter the user\'s name} {email : Enter the user\'s email address} {password : Enter a login password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add user for this application.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => bcrypt($this->argument('password')),
        ]);
    }
}
