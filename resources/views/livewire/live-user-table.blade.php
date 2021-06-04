<div class="flex flex-col ">
	{{-- tabla que muestra los usuarios --}}
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8  w-full">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8  w-full">
			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
				<div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
					<div class="flex text-gray-500 ">

						<select wire:model="perPage">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20">20</option>
						</select>
						<button wire:click="add" class="ml-6">
							<span class="fa fa-user-plus">
							</span>
						</button>
						<input type="text"
						name="" class="form-input w-full test-gray-500 ml-6"
						wire:model="search"
						placeholder="Introduce el término de busqueda...">

						<select class="ml-3" wire:model="user_role">
							<option value="">Selecciona</option>
							<option value="admin">Administrador</option>
							<option value="invitado">Propietario</option>
						</select>

						{{-- elimina los filtros de búqueda --}}
						<button wire:click="clear" class="ml-6">
							<span class="fa fa-eraser">
							</span>
						</button>
					</div>
				</div>
	<div class="flex text-gray-500 ">
				<table class="min-w-ful divide-y divide-gray-200 flex-fill">
					<thead class="bg-gray-50">
						<tr>
								<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">

								<span>Editar</span>

							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">

								<span >Eliminar</span>

							</th>
							<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								ID
							</th>
							<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Name
								{{-- filtros de ordenación --}}
								<button wire:click="sorteable('name')">
									<span class="fa fa{{ $camp === 'name' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Apellido 1
								<button wire:click="sorteable('apellido1')">
									<span class="fa fa{{ $camp === 'apellido1' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Apellido 2
								<button wire:click="sorteable('apellido2')">
									<span class="fa fa{{ $camp === 'apellido2' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								NIF
								<button wire:click="sorteable('nif')">
									<span class="fa fa{{ $camp === 'nif' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Teléfono
								<button wire:click="sorteable('telefono')">
									<span class="fa fa{{ $camp === 'telefono' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Role
								<button wire:click="sorteable('role')">
									<span class="fa fa{{ $camp === 'role' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Nº Cuenta Bancaria
							</th>
							<th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
								Email
								<button wire:click="sorteable('email')">
									<span class="fa fa{{ $camp === 'email' ? $icon:'-circle'}} "></span>
								</button>
							</th>

{{--
							<th scope="col" class="relative px-6 py-3">
								<span class="sr-only">Edit</span>
							</th>
							<th scope="col" class="relative px-6 py-3 ">
								<span class="sr-only">Delete</span>
							</th> --}}
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						@foreach($users as $user)
						<tr>
							<td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
								<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
									{{-- 	<a href="ja" class="fa fa-cogs text-indigo-600 hover:text-indigo-900"
										wire:click="showModal({{$user->id}})>Edit</a> --}}
									<div class="text-sm text-gray-900 flex-fill">
										<button href="javascript:void(0)" wire:click="showModal({{$user->id}})" class="text-gray-500">
											<span class="fa fa-cogs"></span>
										</button>
									</div>
								</span>

							</td>

							<td class="px-3 py-3  whitespace-nowrap text-sm text-gray-500">
								<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
									{{-- 	<a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a> --}}
									<div class="text-sm text-gray-900 flex-fill">
										<button wire:click="delete" class=" text-gray-500">
											<span class="fa fa-eraser"></span>
										</button>
									</div>
								</span>
							</td>
							<td class="px-3 py-3 whitespace-nowrap">
								<div class="flex items-center">

									<div class="ml-2">
										<div class="text-sm font-medium text-gray-900">
											{{$user->id}}
										</div>
									</div>
								</div>
							</td>
							<td class="px-4 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900 flex-fill">{{$user->name}}</div>
							</td>
							<td class="px-4 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900 flex-fill">{{$user->apellido1}}</div>
							</td>
							<td class="px-4 py-3 whitespace-nowrap">
								<div class="text-sm text-gray-900 flex-fill">{{$user->apellido2}}</div>
							</td>
							<td class="px-3 py-4 whitespace-nowrap">

								<div class="text-sm text-gray-900 flex-fill">{{$user->nif}}</div>

							</td>
							<td class="px-4 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900 flex-fill">{{$user->telefono}}</div>
							</td>

							<td class="px-3 py-3 whitespace-nowrap">

								<div class="text-sm text-gray-900 flex-fill">{{$user->role}}</div>

							</td>
							<td class="px-3 py-3 whitespace-nowrap">
								<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
									<div class="text-sm text-gray-900 flex-fill">{{$user->num_cta}}</div>
								</span>
							</td>
							<td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">

								<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
									<div class="text-sm text-gray-900 flex-fill">{{$user->email}}</div>
								</span>
							</td>


						</tr>
						@endforeach

					</tbody>
				</table>
</div>
				<div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
					{{-- paginacion --}}

					{{ $users->links() }}
					{{-- {{ $users->onEachSide(5)->links() }} --}}
				</div>
			</div>
		</div>
	</div>
</div>

{{-- modal de edicion  @push('modals') @endpush--}}








