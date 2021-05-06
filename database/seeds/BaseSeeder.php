<?php
use App\Customer;
use App\Project;
use App\User;
use Illuminate\Database\Seeder;
class BaseSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Please Wait , we populate the database');
        DB::table('users')->insert([
            'name' => 'admin',
            'lastname' => 'admin',
            'phone' => '0612345678',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
        ]);
        $this->command->info('Creating Default User named : admin with password : secret');
        factory(Customer::class, 1)->create()->each(function($customer){
            $this->command->info("Creating Default Customer named : $customer->name");
        });
        factory(Project::class, 1)->create()->each(function($project){
            $this->command->info("Creating Default Project named : $project->name");
        });
    }
}
