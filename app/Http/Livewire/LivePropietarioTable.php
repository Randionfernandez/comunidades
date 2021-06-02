<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use Livewire\{Component,WithPagination};
use App\Models\User;
use App\Models\Propietario;
use App\Models\Propiedad;


class LivePropietarioTable extends Component
{
    public function render()
    {
        return view('livewire.live-propietario-table',[
        	// 'users'=>User::paginate(5),
        	'propietarios'=>Propietario::where('name','like',"%$this->search%")
        	->orWhere('num_cta','like',"%$this->search%")
        	->orWhere('nif','like',"%$this->search%")
        	->orWhere('ref_ca','like',"%$this->search%")
        	->paginate($this->perPage),

        ]);
    }
}
