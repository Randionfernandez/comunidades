<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        
        $actividades = [
        'Ad_Pub' => 'Admin. Pública',
        'TEL' => 'Telefonía',
        'AGUA' => 'Agua',
        'ANT' => 'Antenas',
        'PLAGAS' => 'Antiplagas',
        'ASCN' => 'Ascensores',
        'CONT' => 'Contraincendios',
        'DES' => 'Desatascos',
        'ELEC' => 'Electriciad',
        'BANCO' => 'Entidad financiera',
        'FON' => 'Fontaneŕía',
        'IMP' => 'Impermiabilizaciones',
        'JAR' => 'Jardinería',
        'JUR' => 'Jurídico',
        'LMP' => 'Limpieza',
        'PISC' => 'Piscinas',
        'PA' => 'Porteros automáticos',
        'PG' => 'Puertas garajes',
        'REH' => 'Rehabilitación',
        'SEG' => 'Seguros',
        ];
        
        foreach ($actividades as $codigo => $actividad) {
            Actividad::create([
                'codigo' => $codigo,
                'actividad' => $actividad,
            ]);
        }
    }
}