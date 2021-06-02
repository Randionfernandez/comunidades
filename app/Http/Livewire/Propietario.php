<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Propietario as Propietarios;
class Propietario extends Component
{
    // public function render()
    // {
    //     return view('livewire.propietario');
    // }

	public $data, $name, $email, $selected_id;
	public $updateMode = false;
	public function render()
	{
		$this->data = Propietario::all();
		return view('livewire.propietario');
	}
	private function resetInput()
	{
		$this->name = null;
		$this->email = null;
	}
	public function store()
	{
		$this->validate([
			//'name' => 'required|min:5',
			//'email' => 'required|email:rfc,dns'

			'name' => ['required', 'string', 'max:255'],
              'apellido1' => ['required', 'string', 'max:255'],
              'apellido2' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
              'tipo' => ['required', 'string', 'max:255'],
              'fecha' => ['required', 'string', 'max:255'],
              'nif' => ['required', 'string', 'max:255'],
              'telefono' => ['required', 'string', 'max:255'],
              'calle' => ['required', 'string', 'max:255'],
              'portal' => ['required', 'string', 'max:255'],
              'bloque' => ['required', 'string', 'max:255'],
              'escalera' => ['required', 'string', 'max:255'],
              'piso' => ['required', 'string', 'max:255'],
              'puerta' => ['required', 'string', 'max:255'],
              'codigo_pais' => ['required', 'string', 'max:255'],
              'cp' => ['required', 'string', 'max:255'],
              'pais' => ['required', 'string', 'max:255'],
              'provincia' => ['required', 'string', 'max:255'],
              'localidad' => ['required', 'string', 'max:255'],
		]);
		Propietario::create([
			//'name' => $this->name,
			//'email' => $this->email

			 'name' => $input['name'],
            'apellido1' => $input['apellido1'],
            'apellido2' => $input['apellido2'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'telefono' => $input['telefono'],
            'calle' => $input['calle'],
            'portal' => $input['portal'],
            'bloque' => $input['bloque'],
            'escalera' => $input['escalera'],
            'piso' => $input['piso'],
            'puerta' => $input['puerta'],
            'codigo_pais' => $input['codigo_pais'],
            'cp' => $input['cp'],
            'pais' => $input['pais'],
            'provincia' => $input['provincia'],
            'localidad' => $input['localidad'],
		]);
		$this->resetInput();
	}
	public function edit($id)
	{
		$record = Propietario::findOrFail($id);
		$this->selected_id = $id;
		$this->name = $record->name;
		$this->email = $record->email;
		$this->updateMode = true;
	}
	public function update()
	{
		$this->validate([
			'selected_id' => 'required|numeric',
			'name' => 'required|min:5',
			'email' => 'required|email:rfc,dns'
		]);
		if ($this->selected_id) {
			$record = Propietario::find($this->selected_id);
			$record->update([
				'name' => $this->name,
				'email' => $this->email
			]);
			$this->resetInput();
			$this->updateMode = false;
		}
	}
	public function destroy($id)
	{
		if ($id) {
			$record = Propietario::where('id', $id);
			$record->delete();
		}
	}
}

