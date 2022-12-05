<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociateData extends Model
{
    protected $table = 'associate_information';
    use HasFactory;

    public static function associate($associate)
    {
        return $associate->belongsTo(Associate::class, 'user_id', 'user_id');
    }
}
