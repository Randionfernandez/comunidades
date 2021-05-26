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
			'name' => 'required|min:5',
			'email' => 'required|email:rfc,dns'
		]);
		Contactos::create([
			'name' => $this->name,
			'email' => $this->email
		]);
		$this->resetInput();
	}
	public function edit($id)
	{
		$record = Contactos::findOrFail($id);
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
			$record = Contactos::find($this->selected_id);
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
			$record = Contactos::where('id', $id);
			$record->delete();
		}
	}
}

