<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Models\Propiedad;
use Livewire\{Component,WithPagination};
// use Livewire\WithPagination;


class LivePropiedadTable extends Component
{
	use WithPagination;

	//se definen las variables y se llaman desde la vista con la directiva wire:nombre_vble
	public $search='';
	public $perPage=5;
	public $camp=null;
	public $order=null;
	public $icon='-circle';

	/*public $propiedades=[
		'id',
		'comunidades_id',
		'users_id',
		'ref_ca',
		'parte',
		'coeficiente',
		'tipo',
		'observaciones'

	];

	*/

	// public $selected_id;
	// public $updateMode=false;

	public function render()
	{
		$propiedades=Propiedad::termino($this->search);

			//verificamos el orden y el campo a no nulos y se lo agrega a ususarios
		if ($this->camp && $this->order) {
			$propiedades=$propiedades->orderBy($this->camp,$this->order);
		}

		$propiedades=$propiedades->paginate($this->perPage);

		return view('livewire.live-propiedad-table',[
			'propiedades'=>$propiedades

		]);
	}
	 /**
	 función de ordenación en filtros según el campo pasado por parámetro

	 comprobamos el estado del campo como se ordena; soluciona el error de null por defecto en ambas varibales de ordenación.*/
	 public function sorteable($camp){
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



	// private function resetInput()
	// {
	// 	$this->name = null;
	// 	$this->phone = null;
	// }

	// public function store()
	// {
	// 	$this->validate([
	// 		'name' => 'required|min:5',
	// 		'phone' => 'required'
	// 	]);

	// 	Contact::create([
	// 		'name' => $this->name,
	// 		'phone' => $this->phone
	// 	]);

	// 	$this->resetInput();
	// }

	// public function edit($id)
	// {
	// 	$record = Propiedad::findOrFail($id);

	// 	$this->selected_id = $id;
	// 	$this-> comunidades_id= $record->comunidades_id;
	// 	$this-> users_id= $record->users_id;
	// 	$this->ref_ca=$record->ref_ca;
	// 	$this->parte=$record->parte;
	// 	$this->coeficiente=$record->coeficiente;
	// 	$this->observaciones=$record->observaciones;

	// 	$this->updateMode = true;
	// }

	// public function update()
	// {
	// 	$this->validate([
	// 		'selected_id' => 'required|numeric',
	// 		'comunidades_id' => 'required|numeric',
	// 		'users_id' => 'required|numeric',
	// 		'ref_ca'=>'required',
	// 		'parte'=>'required|numeric',
	// 		'coeficiente'=>'required|numeric',
	// 		'observaciones'
	// 	]);

	// 	if ($this->selected_id) {
	// 		$record = Propiedad::find($this->selected_id);
	// 		$record->update([
	// 			'comunidades_id' => $this->comunidades_id,
	// 			'users_id' => $this->users_id,
	// 			'ref_ca' => $this->ref_ca,
	// 			'parte' => $this->parte,
	// 			'coeficiente' => $this->coeficiente,
	// 			'observaciones' => $this->observaciones

	// 		]);

	// 		$this->resetInput();
	// 		$this->updateMode = false;
	// 	}

	// }

	// public function destroy($id)
	// {
	// 	if ($id) {
	// 		$record = Propiedad::where('id', $id);
	// 		$record->delete();
	// 	}
	// }
	}


