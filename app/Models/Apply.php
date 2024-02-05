<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
  use HasFactory;

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function job()
  {
    return $this->belongsTo(Job::class);
  }

  public function getCreatedAtAttribute($value)
  {
    // Convierte la fecha a un objeto Carbon y formatea como d/m/Y
    return Carbon::parse($value)->format('d/m/Y');
  }
}
