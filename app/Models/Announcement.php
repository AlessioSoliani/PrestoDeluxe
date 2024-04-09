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
    
    public function setAccepted($value){
        //il campo "is_accepted" dell'annuncio sul quale e richiamato il metodo sarà uguale al valore datogli dal revisore
        // true se accetta false se rifiuta(il parametro che arriverà)
        $this->is_accepted = $value;
        //salviamo la modifica
        $this->save();
        
        return true;
    }

    // restituisce il numero di annunci in attese si essere revisionati ovvero che hanno null nel DB
    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted')->count();
    }
}
