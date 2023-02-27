<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Role;

class SetRoleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:role {email} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user role';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $email = $this->argument('email');
        $role = $this->argument('role');
        try{
            $role = Role::where('title', $role)->firstOrFail();
            $user = User::where('email', $email)->firstOrFail();
            $user->setRole($role->id, $user->id);
            return $this->info('Success! Role was create '. $email);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return $this->info('Error!: '.$e->getMessage());
        }



    }
}
