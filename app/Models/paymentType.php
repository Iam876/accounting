<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
