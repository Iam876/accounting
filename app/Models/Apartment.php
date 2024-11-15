<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    // In Apartment.php
    public function pic()
    {
        return $this->belongsTo(picCompany::class, 'pic_id', 'id');
    }

    public function rooms()
    {
        return $this->hasMany(roomTable::class,'apartment_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'apartment_id');
    }


}
