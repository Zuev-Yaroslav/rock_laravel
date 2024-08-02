<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        $users = User::factory(50)->create();
        $users->each(function (User $user) use ($roles) {
            $user->roles()->sync($roles->random(rand(1, 5))->pluck('id'));
            $roles = $user->roles()->pluck('entity');
            $permissions = Permission::whereIn('entity', $roles)->get();
            $user->permissions()->sync($permissions->random(rand(0, count($permissions)))->pluck('id'));
            Profile::factory()->create(['user_id' => $user->id]);
//            Profile::factory()->create(['profileable_id' => $user->id, 'profileable_type' => User::class]);
//            $user->profile()->factory()->firstOrCreate();
        });
    }
}
