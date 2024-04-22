<?php

namespace App\Models;


use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{

    use HasFactory, Searchable;
    protected $fillable=['title','body','price'];
    //relazione one to many un annuncio per più utenti
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        //relazione one to many un annuncio può avere una categoria

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //relazione one to many un annuncio può avere più immagini
    public function images(){
        return $this->hasMany(Image::class);
    }
  //funzione dove settiamo l'accettazione dell'annuncio in un valore null e che prenderà valore true o false in base all'accettazione o il rifiuto
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
    //funzione di ricerca
    public function toSearchableArray(){
       $category = $this->category;
       $array = [
        'id' => $this->id,
        'title' => $this->title,
        'body' => $this->body,
        'price' => $this->price,
        'category' => $category,
       ];
       return $array;
    }

   
}
