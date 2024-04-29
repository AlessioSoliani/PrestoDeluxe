<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\setWatermark;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use App\Jobs\googleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CreateAnnouncement extends Component
{
    use WithFileUploads;


    public $title;
    public $body;
    public $price;
    public $category_id;
    public $temporary_images;
    public $images = [];
    public $image;
    public $announcement;
    public $userId;
    public $user_id;



    protected $rules = [
        'title'=>'required|min:3|max:150',
        'body'=>'required|min:8',
        'price'=>'required',
        'category_id'=>'required',
        'images.*' => 'image|required|max:1024',
        'temporary_images.*'=>'image|required|max:1024',
    ];
    protected $message = [
        'title'=> 'il titolo è neccessario',
        'title'=> 'il titolo è troppo corto',
        'title'=>'il titolo è troppo lungo',
        'body'=>'la descrizione è neccessaria',
        'body'=> 'la descrizione è troppo corta',
        'price'=>'il prezzo è fondamentale',
        'temporary_images.required'=> 'l\'immagine è richiesta',
        'temporary_images.*.image'=> 'I file devono essere immagini',
        'temporary_images.*.max'=> 'l\'immagine deve essere di massimo 1mb',
        'images.*.max'=>'l\'immagine deve essere di massimo 1mb',
        'images.*.required'=>'carica almeno un\'immagine',
    ];


    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user_id = $userId;
    }

    public function updatedTemporaryImages()
    {
        if($this->validate([//validazione di temporary_images se supera la validazione
            'temporary_images.*'=>'image|max:1024',
            ])){
                foreach($this->temporary_images as $image){
                    //la aggiunge all'array images[]
                    $this->images[] = $image;
                }
            }
    }


    //funzione per rimuovere le immagini che si attiva al click del bottone cancella nel richiamo
        //wire:click della vista create-announcement, tramite $key che rappresenta l'indice nell'array images
        //dell'immagine da rimuovere
        public function removeImage($key){
            if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
        }

    public function store(){
       // dd($userId);
      // dd($this->user_id);
        $this->validate();
        // dd($this);
        // salviamo il record della categoria attraverso il metodo find:
        $category = Category::find($this->category_id);
        // dd($category->announcements());
        //tramite la variabile che contiene l'oggetto category sfruttiamo la relazione 1aN dichiarata nel modello
        //per far si che si colleghi agli annunci che qualsiasi utente creerà.
        $this->announcement = $category->announcements()->create([//sfruttiamo l'assegnazione di massa con il metodo create per inserire i valori che l'utente compilerà nel form
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price,
            'user_id' => $this->user_id,
        ]);
        //quì ripetuto il codice che prima era nel public render
        // //$this->validate();
        // $this->announcement = Category::find($this->category_id)->announcements()->create($this->validate());

        if(count($this->images)){
            foreach($this->images as $image){
               // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName,'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,500,500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new googleVisionLabelImage($newImage->id),
                    new setWatermark($newImage->id),

                ])->dispatch($newImage->id);

            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));

        }
        session()->flash('message','articolo creato con successo');
        $this->cleanForm();

        // Auth::user()->announcements()->save($announcement);


    }

        public function cleanForm(){
            $this->title='';
            $this->body='';
            $this->price='';
            $this->category_id='';
            $this->images = [];
            $this->temporary_images = [];



        $this->formreset();
        session()->flash('success','Announcement successfully created');
        }

    public function formreset(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category_id='';
    }


    public function render()
    {
        return view('livewire.create-announcement');
    }



    }
