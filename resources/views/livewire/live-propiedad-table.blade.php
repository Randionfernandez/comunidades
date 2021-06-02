<div class="flex flex-col">
	{{-- tabla que muestra las propiedades --}}
	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8  w-full">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8  w-full">
			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg  w-full">
				<div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
					<div class="flex text-gray-500">

						<select wire:model="perPage">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20">20</option>
						</select>

						<input type="text"
						name="" class="form-input w-full test-gray-500 ml-6"
						wire:model="search"
						placeholder="Introduce el término de busqueda...">
						<button>

						</button>
					</div>
				</div>
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								ID
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								COMUNIDAD ID
								{{-- filtros de ordenación --}}
								<button wire:click="sorteable('ref_ca')">
									<span class="fa fa{{ $camp === 'ref_ca' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								PROPIETARIO ID
								<button wire:click="sorteable('ref_ca')">
									<span class="fa fa{{ $camp === 'ref_ca' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Referencia catastral
								<button wire:click="sorteable('ref_ca')">
									<span class="fa fa{{ $camp === 'ref_ca' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Parte
								<button wire:click="sorteable('parte')">
									<span class="fa fa{{ $camp === 'parte' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Coeficiente
								<button wire:click="sorteable('coeficiente')">
									<span class="fa fa{{ $camp === 'coeficiente' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Tipo
								<button wire:click="sorteable('tipo')">
									<span class="fa fa{{ $camp === 'tipo' ? $icon:'-circle'}} "></span>
								</button>
							</th>
							<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Observaciones
								<button wire:click="sorteable('observaciones')">
									<span class="fa fa{{ $camp === 'observaciones' ? $icon:'-circle'}} "></span>
								</button>
							</th>

							<th scope="col" class="relative px-6 py-3">
								<span class="sr-only">Edit</span>
							</th>
							<th scope="col" class="relative px-6 py-3">
								<span class="sr-only">Delete</span>
							</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200" 						{{-- wire:model="propiedades --}}>

						@foreach($propiedades as $propiedad)
						<tr>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="flex items-center">

									<div class="ml-4">
										<div class="text-sm font-medium text-gray-900">
											{{$propiedad->id}}
										</div>
									</div>
								</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900">
									{{$propiedad->comunidades_id}}</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">{{$propiedad->users_id}}</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">{{$propiedad->ref_ca}}</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">
										{{$propiedad->parte}}
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">
										{{$propiedad->coeficiente}}
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">
										{{$propiedad->tipo}}
									</div>
								</td>
								<td class="px-6 py-4 whitespace-nowrap">
									<div class="text-sm text-gray-900">
										{{$propiedad->observaciones}}
									</div>
								</td>

								<td class="px-6 py-4 inline-flex whitespace-nowrap text-right text-sm font-medium">
									<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
										<a href="#" wire:click="edit({{$propiedades->id}})"class="text-indigo-600 hover:text-indigo-900">Edit</a>
									</span>
								</td>
								<td class="px-6 py-4 inline-flex whitespace-nowrap text-right text-sm font-medium">
									<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
										<a href="#" wire:click="destroy({{$propiedades->id}})"class="text-indigo-600 hover:text-indigo-900">Delete</a>

									</td>
								</tr>
								@endforeach

							</tbody>
						</table>
						<div class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
							{{-- paginacion --}}

							{{ $propiedades->links() }}
							{{-- {{ $users->onEachSide(5)->links() }} --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



