<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:150')]
    public $title;
    #[Validate('required|min:8')]
    public $body;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    #[Validate('image.*|max:1024')]
    public $images = [];
    #[Validate('temporary_image.*|max:1024')]
    public $temporary_images;
    public $image;
    protected $message = [
    'temporary_images:required'=> 'l\'immagine è richiesta',
    'temporary_images.*.image'=> 'l\'immagine di massimo 1mb',
    'images.image'=>'l\'immagine massimo un mb',
    'images.max'=>'l\'immagine un mb',
    'temporary_images.*.max'=>'l\'immagine deve essere massimo di 1mb',
    ];

    public function store(){
        $this->validate();
        //salviamo il record della categoria attraverso il metodo find:
        $category = Category::find($this->category);
        //tramite la variabile che contiene l'oggetto category sfruttiamo la relazione 1aN dichiarata nel modello
        //per far si che si colleghi agli annunci che qualsiasi utente creerà.
        $announcement = $category->announcements()->create([//sfruttiamo l'assegnazione di massa con il metodo create per inserire i valori che l'utente compilerà nel form
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
        ]);

        Auth::user()->announcements()->save($announcement);


        $this->formreset();
        session()->flash('success','Announcement successfully created');
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

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }



    }
}
