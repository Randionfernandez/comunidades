<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveModal extends Component
{
	//variables
	public $showModal='hidden';
	//escucha los eventos
	protected $listeners = [
		'showModal'
	];
	public function render()
	{
		return view('livewire.live-modal');
	}

    /** muestra la modal
    2 formas de hacerlo:
    1ª la funcion tiene nombre diferente al evento
    2ª cuando el nombre del método es igual es igual al evento
    protected $listeners = [
'showModal'=>'sacarModal'];
  public function sacarModal ($user){
dd($user);

    }

     */
    public function  showModal($user){
// dd($user);
    	$this->showModal='';
    }

    //oculta el modal
    public function  closeModal(){

    	$this->showModal='hidden';
    }
}
