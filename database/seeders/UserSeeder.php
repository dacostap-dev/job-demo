<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $admin = \App\Models\User::factory()->create([
      'name' => 'Example Admin User',
      'email' => 'admin@example.com',
    ]);

    $admin->assignRole('admin');

    $user = \App\Models\User::factory()->create([
      'name' => 'Postuante',
      'email' => 'postulante@example.com',
    ]);

    $user->assignRole('applicant');
  }
}
