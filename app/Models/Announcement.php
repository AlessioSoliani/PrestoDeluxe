<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable=['title','body','price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // restituisce il numero di annunci in attese si essere revisionati ovvero che hanno null nel DB
    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted')->count();
    }
}
