<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\{Component,WithPagination};
// use Livewire\Component;
// use Livewire\WithPagination;

class LiveUserTable extends Component
{
	use WithPagination;

    //variables
	public $search='';
	public $perPage=5;
	public $camp= null;
	public $order=null;
	public $icon='-circle';
    public $user_role ='';
    public $showModal = 'hidden'; //se extraerá a otro componente y se usará a nivel global

    // protected $queryString=[
    //     'search'=>[except=>''],
    //      'camp' =>[except=>null],
    //      'order'  =>[except=>null],
    // ];

    public function render()
    {
     $users = User::termino($this->search)
     ->role($this->user_role);
			//verificamos el orden y el campo a no nulos y se lo agrega a ususarios
     if ($this->camp && $this->order) {
         $users=$users->orderBy($this->camp,$this->order);
     }
     $users=$users->paginate($this->perPage);
 		// 'users'=>User::paginate(5),

     return view('livewire.live-user-table',[
         'users'=>$users
     ]);
 }
 /** Elimina los filtros de búsqueda colocando las variables publicas a su estado original*/
 public function clear(){
// $this->page=1;
// $this->order=null;
// $this->camp=null;
// $this->icon='-circle';
// $this->search="";
// $this->perPage=5;
    $this->reset();

}
// public function add(){
//    User::find(Auth::id())
// ;
//    }
/** Método mágico para volver a inicializar la página, necesario asociarl el nombre de la varibale al updating; en este caso search es lavariable global de búsqueda*/

public function updatingSearch()
{
    $this->resetPage();
}

    /**
    función de ordenación con filtros según el campo pasado por parámetro,
    invvierte el orden pasado por primera vez para que nunca esté a null*/
    public function sorteable($camp){
    	// dd($camp);
    	//comprobamos el estado del campo como se ordena; soluciona el error de null por defecto en ambas variables de ordenación.
    	if ($camp!==$this->camp) {
    		$this->order=null;
    	}

    	switch ($this->order) {
    		case null:
    		$this->order='asc';
    		$this->icon='-arrow-circle-up';
    		break;

    		case 'asc':
    		$this->order='desc';
    		$this->icon='-arrow-circle-down';
    		break;

    		case 'desc':
    		$this->order=null;
    		$this->icon='-circle';

    		break;
    	}
    	$this->camp= $camp;
    }

    /** Muestra el modal al editar, creaer o eliminar, recibe todos los parámetros del usuaruio que se estén enviando en el id al pasar el modelo con el método emit() las compnentes se comunican y quedan vinculadas, se pasan como parámetros el nombre del evento y el segundo parametro opcional los datos que se quieren mostrar
    */
    public function showModal(User $user){
        // dd($user);
        $this->emit('showModal', $user);
    }
}
