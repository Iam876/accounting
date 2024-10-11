<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(Schools::class);
    }
    public function room()
    {
        return $this->belongsTo(roomTable::class, 'room_id');
    }
    public function package()
    {
        return $this->belongsTo(PackageChoose::class, 'package_id');
    }
    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id');
    }
}
