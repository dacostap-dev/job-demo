<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'company',
    'description',
    'salary',
  ];

  public function applies()
  {
    return $this->hasMany(Apply::class);
  }

  public function getCreatedAtAttribute($value)
  {
    // Convierte la fecha a un objeto Carbon y formatea como d/m/Y
    return Carbon::parse($value)->format('d/m/Y');
  }
}
