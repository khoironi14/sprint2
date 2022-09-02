<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class Registrasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:registrasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User Login';

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
     * @return int
     */
    public function handle()
    {
       try {
        $user= User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')

         ]);

        $token = $user->createToken('auth_token')->plainTextToken;
      if($user){
        echo "Create User Success";
      }
       } catch (QueryException $e) {
        echo $e;
       }
    }
}
