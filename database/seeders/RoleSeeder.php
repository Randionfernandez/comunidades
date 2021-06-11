<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          DB::table('roles')->insert([
            'name' => "admin")];
           //ROLES
    	$admin=Role::create(['name'=>'admin']);
    	$guest=Role::create(['name'=>'invitado']);

//          //Permisos roles
//     	$permissions=[
//     		'create',
//     		'read',
//     		'update',
//     		'delete'
//     	];
// //captura todos los roles de la base de datos
//     	foreach (Role::all() as $rol){
//     		foreach ($permissions as $perm) {
//     			Permission::create(['name'=>"{$rol->name} $perm"]);
//     		}
//     	}
//     	/* Asignar permisos
//     	se asignan todos los permisos al admind*/

//     	$admin->syncPermissions(Permission::all());
//     	$propietario->syncPermissions(Permission::where('name','like',"%propietario%"));

//     	$admin->assignRole('administrador');
//     	$admin->assignRole('propietario');

//               /* ++ insertar con modelos ++
//               Propiedad::factory()->create()[
//               'user_id'=>$propietario->id,
//               'cif'=>,'123456789',
//                ]);

//               */

    }
}
