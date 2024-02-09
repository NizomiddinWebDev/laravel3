<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "tg_id",
        "first_name",
        "last_name",
        "father_name",
        "phone",
        "region",
        "district",
        "school",
        "subject"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
