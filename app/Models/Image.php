<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    protected $fillable = ['path'];
    //relazione one to many con l'annuncio
    public function announcement(){
    return $this->belongsTo(Announcement::class);
    }
}
