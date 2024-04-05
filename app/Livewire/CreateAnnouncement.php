<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\Attributes\Validate;

class CreateAnnouncement extends Component
{

    #[Validate('required|min:3|max:150')] 
    public $title;
    #[Validate('required|min:8')] 
    public $body;
    #[Validate('required|numeric')] 
    public $price;
    #[Validate('required')] 
    public $category;

    public function store(){
        $this->validate();
        //salviamo il record della categoria attraverso il metodo find:        
        $category = Category::find($this->category);
        //tramite la variabile che contiene l'oggetto category sfruttiamo la relazione 1aN dichiarata nel modello
        //per far si che si colleghi agli annunci che qualsiasi utente creerà. 
        $category->announcements()->create([//sfruttiamo l'assegnazione di massa con il metodo create per inserire i valori che l'utente compilerà nel form
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);

    
        $this->formreset();
        session()->flash('success','Annuncio creato con successo');
    }

    public function formreset(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
    }




    public function render()
    {
        return view('livewire.create-announcement');
    }
}
