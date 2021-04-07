<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profileImage(){
        $imagePath = ($this->image) ?  $this->image : 'profile/FfMogCa69QPv9Iu4Sozbk2XJtm0EcOqNvq60yPaT.jpg';

        return '/storage/' . $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
