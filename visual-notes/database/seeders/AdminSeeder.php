<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name'                  => 'Admin',
        
            'email'                 => 'admin@vnotes.com',
            'email_verified_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            'password'              => Hash::make('Admin@123'),
           
        ]);

        $role = Role::updateOrCreate(['name' => 'Admin'],['name' => 'Admin']);
        $permissions = Permission::select('id')->get()->pluck('id')->toArray();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->name]);
    }
}
