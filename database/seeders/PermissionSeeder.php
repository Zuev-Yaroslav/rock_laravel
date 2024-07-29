<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = ['post', 'product', 'video'];
        foreach ($entities as $entity) {
            Permission::firstOrCreate(['name'=> $entity . '_index', 'entity' => $entity]);
            Permission::firstOrCreate(['name'=> $entity . '_show', 'entity' => $entity]);
            Permission::firstOrCreate(['name'=> $entity . '_update', 'entity' => $entity]);
            Permission::firstOrCreate(['name'=> $entity . '_destroy', 'entity' => $entity]);
            Permission::firstOrCreate(['name'=> $entity . '_store', 'entity' => $entity]);
        }
//        Permission::firstOrCreate(['name'=>'index']);
//        Permission::firstOrCreate(['name'=>'show']);
//        Permission::firstOrCreate(['name'=>'update']);
//        Permission::firstOrCreate(['name'=>'destroy']);
//        Permission::firstOrCreate(['name'=>'store']);
    }
}
