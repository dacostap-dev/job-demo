<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // create roles
    $userRole = Role::create(['name' => 'applicant']);
    $adminRole = Role::create(['name' => 'admin']);

    // create permissions

    //Apply
    $permission_show_apply = Permission::create(['name' => 'show:apply']);
    $permission_create_apply = Permission::create(['name' => 'create:apply']);
    $permission_update_apply = Permission::create(['name' => 'update:apply']);
    $permission_delete_apply = Permission::create(['name' => 'delete:apply']);

    //Jobs
    $permission_show_jobs = Permission::create(['name' => 'show:jobs']);
    $permission_create_jobs = Permission::create(['name' => 'create:jobs']);
    $permission_update_jobs = Permission::create(['name' => 'update:jobs']);
    $permission_delete_jobs = Permission::create(['name' => 'delete:jobs']);


    $userRole->syncPermissions([
      $permission_show_apply,
      $permission_create_apply,
      $permission_update_apply,
      $permission_delete_apply
    ]);

    $adminRole->syncPermissions([
      $permission_show_jobs,
      $permission_create_jobs,
      $permission_update_jobs,
      $permission_delete_jobs
    ]);
  }
}
