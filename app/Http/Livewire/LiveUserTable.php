<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\{Component,WithPagination};
// use Livewire\Component;
// use Livewire\WithPagination;

class LiveUserTable extends Component
{
	use WithPagination;

	public $search='';
	public $perPage=5;
	public $camp= null;
	public $order=null;
	public $icon='-circle';

    protected $queryString=[
        'search'=>[except=>''],
    ]

	public function render()
	{
			$users = User::where('name','like',"%{$this->search}%")
        	->orWhere('apellido1','like',"%{$this->search}%")
        	->orWhere('apellido2','like',"%{$this->search}%")
			->orWhere('email','like',"%{$this->search}%")
			->orWhere('nif','like',"%{$this->search}%");

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
/** Elimina los filtros de búsqueda*/
public function clear(){
$this->page=1;
$this->order=null;
$this->camp=null;
$this->icon='-circle';
$this->search="";
$this->perPage=5;

}


// public function add(){
//    User::find(Auth::id())
//  return view('');
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
    	//comprobamos el estado del campo como se ordena; soluciona el error de null por defecto en ambas varibales de ordenación.
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
}
