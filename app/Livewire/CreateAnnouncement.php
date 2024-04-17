<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
    //#[Validate('images.*|max:1024')]
    public $images = [];
    //#[Validate('temporary_images.*|max:1024')]
    public $temporary_images;
    public $image;
    protected $rules = [
        'images.*' => 'required|image|max:1024',
        'temporary_images.*'=>'required|image|max:1024',
    ];
    protected $message = [
        'temporary_images.*.required'=> 'l\'immagine è richiesta',
        'temporary_images.*.image'=> 'l\'immagine di massimo 1mb',
        'images.image'=>'l\'immagine massimo un mb',
        'images.max'=>'l\'immagine un mb',
        'images.required'=>'l\'immagine è richiesta',
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

        //$this->validate();
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());

        if(count($this->images)){
            foreach($this->images as $image){
                $this->announcement->image()->create(['path'=>$image->store('images','public')]);
            }
        }

        Auth::user()->announcements()->save($announcement);

        session()->flash('message','il messaggio che ci pare');
        $this->cleanForm();
    }

        public function cleanForm(){
            $this->title='';
            $this->body='';
            $this->price='';
            $this->category='';
            $this->image='';
            $this->images = [];
            $this->temporary_images = [];
            $this->form_id = rand();


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

        public function removeImage($key){
            if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
        }
    }
