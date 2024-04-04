<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateAnnouncement extends Component
{

    #[Validate('required|min:3|max:150')] 
    public $title;
    #[Validate('required|min:8')] 
    public $body;
    #[Validate('required|numeric')] 
    public $price;

    public function store(){
        $this->validate();

     Announcement::create([
         'title'=>$this->title,
         'body'=>$this->body,
         'price'=>$this->price,
        //  'author_id'=>$this->author_id,
        ]);
        $this->formreset();
        session()->flash('success','Annuncio creato con successo');
    }

    public function formreset(){
        $this->title='';
        $this->body='';
        $this->price='';
    }




    public function render()
    {
        return view('livewire.create-announcement');
    }
}
