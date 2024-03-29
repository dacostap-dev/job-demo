<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\Job::factory(500)->create();

    $this->call(PermissionSeeder::class);
    $this->call(UserSeeder::class);
  }
}
