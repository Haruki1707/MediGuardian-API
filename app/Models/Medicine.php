<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
