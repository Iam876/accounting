<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomTable extends Model
{
    use HasFactory;
    // protected $table = 'room_table';
    protected $fillable = [
        'apartment_id',
        'room_number',
        'room_type',
        'initial_rent',
        'max_student',
        'facilities',
        'photos',
        'notes',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'room_id');
    }

}
