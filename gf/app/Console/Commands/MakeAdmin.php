<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email? : The email of the user to make admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user an administrator';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        // If no email provided, show all users and let them choose
        if (!$email) {
            $users = User::all();

            if ($users->isEmpty()) {
                $this->error('No users found in the database!');
                $this->info('Please register a user first at: http://localhost/register');
                return 1;
            }

            $this->info('Available users:');
            $this->table(
                ['ID', 'Name', 'Email', 'Admin Status'],
                $users->map(function ($user) {
                    return [
                        $user->id,
                        $user->name,
                        $user->email,
                        $user->is_admin ? '✓ Admin' : '✗ Not Admin'
                    ];
                })
            );

            $email = $this->ask('Enter the email address of the user to make admin');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email '{$email}' not found!");
            return 1;
        }

        if ($user->is_admin) {
            $this->warn("User '{$user->name}' ({$user->email}) is already an admin!");

            $remove = $this->confirm('Do you want to remove admin privileges?', false);
            if ($remove) {
                $user->is_admin = false;
                $user->save();
                $this->info("Admin privileges removed from '{$user->name}' ({$user->email})");
            }
            return 0;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("✓ Successfully made '{$user->name}' ({$user->email}) an administrator!");
        $this->info('');
        $this->info('Admin can now access:');
        $this->line('  - Dashboard: ' . url('/admin/dashboard'));
        $this->line('  - Events: ' . url('/admin/events'));
        $this->line('  - Registrations: ' . url('/admin/registrations'));
        $this->line('  - Members: ' . url('/admin/members'));
        $this->line('  - Contacts: ' . url('/admin/contacts'));

        return 0;
    }
}
