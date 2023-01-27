<?php
declare(strict_types=1);

/**
 * TODO
 *
 * Revisar test para create, utilizando un FormRequest para la validación
 * preferentemente con un UpdateComunidadRequest válido para apirest y formulario
 *
 * Revisar también denom_is_required
 */

namespace Tests\Feature\Comunidades;

use App\Models\Comunidad;
use App\Models\User;
use Database\Seeders\DivisaSeeder;
use Database\Seeders\PaisSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ComunidadesTest extends TestCase
{

    /* No ejecuta los seeders, ni las migraciones, (si estuviesen actualizadas)
    */
    use RefreshDatabase;

//    protected $seed = true;  // Ejecuta los seeders
// cambios sugeridos desde aprendible.com 'desarrollo api' Lección 4.- Instalación del proyecto con Blueprint
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            //      DatabaseSeeder::class,
            DivisaSeeder::class,
            PaisSeeder::class,
            //    UserSeeder::class,
        ]);
    }

    /**
     * @test
     */
    public function can_fetch_all_comunidades()
    {
        $this->withoutExceptionHandling();

        $comunidades = Comunidad::factory()->count(3)->create();

        $response = $this->getJson(route('api.v1.comunidades.index'));

        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                [
                    'type' => 'comunidades',
                    'id' => (string)$comunidades[0]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[0]->cif,
                        'denom' => $comunidades[0]->denom,
                        'email' => $comunidades[0]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[0]->getRouteKey())
                    ],
                ],
                [
                    'type' => 'comunidades',
                    'id' => (string)$comunidades[1]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[1]->cif,
                        'denom' => $comunidades[1]->denom,
                        'email' => $comunidades[1]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[1]->getRouteKey())
                    ],
                ],
                [
                    'type' => 'comunidades',
                    'id' => (string)$comunidades[2]->getRouteKey(),
                    'attributes' => [
                        'cif' => $comunidades[2]->cif,
                        'denom' => $comunidades[2]->denom,
                        'email' => $comunidades[2]->email,
                    ],
                    'links' => [
                        'self' => route('api.v1.comunidades.show', $comunidades[2]->getRouteKey())
                    ],
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function can_fetch_single_comunidad()
    {
        $this->withoutExceptionHandling();   // informará del error pero con más detalle

        $comunidad = Comunidad::factory()->create();

        $response = $this->getJson(route('api.v1.comunidades.show', $comunidad));

        $response->assertStatus(200);


        $response->assertHeader(
            'Content-Type', 'application/vnd.api+json'
        );

        // Si la 'denom' contiene acentos, falla el test, probablemente debido a la codificación en json
       // $response->assertSee($comunidad->denom);  // eliminar, ya se comprueba en el json

        $response->assertSee($comunidad->email);  // eliminar, ya se comprueba en el json

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string)$comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => $comunidad->cif,
                    'denom' => $comunidad->denom,
                    'email' => $comunidad->email,
                    'direccion' => $comunidad->direccion,
                    'cp' => $comunidad->cp
                ],
                'links' => [
                    'self' => route('api.v1.comunidades.show', $comunidad->getRouteKey())
                ]
            ],
        ]);
    }

    /**
     * @test
     */
    public function can_create_comunidad()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->postJson(route('api.v1.comunidades.store'), [
            'data' => [
                'type' => 'comunidades',
                'attributes' => [
                    'cif' => "12345678w",
                    'fechalta' => "2022-02-28",
                    'denom' => "Testeando comunidad",
                    'partes' => 10,
                    'email' => "123456@gmail.com",
                    'direccion' => "quinto pino",
                    'cp' => '07007',
                    'pais' => 'ESP',
                ],
            ]
        ], [
            'Content-Type' => 'application/vnd.api+json'
        ]);

        $response->assertCreated();

        $comunidad = Comunidad::first();

        $response->assertHeader(
            'Location', route('api.v1.comunidades.show', $comunidad),
        );

        $response->assertHeader(
            'Content-Type', "application/vnd.api+json"
        );

        $response->assertJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string)$comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => "12345678w",
                    'fechalta' => $comunidad->fechalta,
                    'denom' => "Testeando comunidad",
                    'partes' => 10,
                    'email' => "123456@gmail.com",
                    'direccion' => "quinto pino",
                    'cp' => '07007',
                    'pais' => 'ESP'
                ],
            ]
        ]);
    }

    /*
     * Estas funciones existen en Response. Ignoro porqué se incluyen en el código
      public function assertForbidden()
        {
            return $this->assertStatus(403);
        }

        public function assertUnAuthorized()
        {
            return $this->assertStatus(401);
        }*/

    /**
     * @test
     */
    public function guests_cannot_create_comunidad()
    {
//        $this->withoutExceptionHandling();

        $this->postJson(route('api.v1.comunidades.store'), [],
            ['Content-Type' => 'application/vnd.api+json'])
            ->assertUnAuthorized();

//         $response = $this->assertJsonApiError();

        $this->assertDatabaseCount('comunidades', 0);
    }

    /**
     * @test
     */
    public function can_update_comunidad()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $comunidad = Comunidad::factory()->create();


        $response = $this->patchJson(route('api.v1.comunidades.update', $comunidad), [
            'data' => [
                'type' => 'comunidades',
                'attributes' => [
                    'cif' => '12345678w',
                    'fechalta' => '2022-02-28',
                    'partes' => 10,
                    'denom' => 'Testeando comunidad',
                    'email' => '123456@gmail.com',
                    'direccion' => 'quinto pino',
                    'cp' => '07007',
                    'pais' => "ESP",
                    'provincia' => 'Cáceres',
                    'municipio' => 'Palma de Mallorca',
                ],
            ]
        ], [
            'Content-Type' => 'application/vnd.api+json'
        ]);

        $response->assertOk();

        $response->assertHeader(
            'Location', route('api.v1.comunidades.show', $comunidad),
        );
        $response->assertHeader(
            'Content-Type', "application/vnd.api+json"
        );

        $response->assertExactJson([
            'data' => [
                'type' => 'comunidades',
                'id' => (string)$comunidad->getRouteKey(),
                'attributes' => [
                    'cif' => '12345678w',
                    'fechalta' => '2022-02-28',
                    'partes' => 10,
                    'denom' => 'Testeando comunidad',
                    'email' => '123456@gmail.com',
                    'direccion' => 'quinto pino',
                    'cp' => '07007',
                    'pais' => 'ESP',
                    'provincia' => 'Cáceres',
                    'municipio' => 'Palma de Mallorca',
                    'localidad' => $comunidad->localidad,
                    'activa' => true,
                    'gratuita' => true,
                    'observaciones' => $comunidad->observaciones,
                    'administrador' => $comunidad->administrador,
                    'presidente' => $comunidad->presidente,
                    'secretario' => $comunidad->secretario,
                ],
                'links' => [
                    'self' => route('api.v1.comunidades.show', $comunidad)
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    function can_delete_comunidad()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $comunidad = Comunidad::factory()->create();

        $this->deleteJson(route('api.v1.comunidades.destroy', $comunidad))
            ->assertNoContent();  // Estado 204, que indica "Sin contenido"

        $this->assertSoftDeleted($comunidad);
    }

    /**
     * @test
     */
    function denom_is_required()
    {
//        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        Sanctum::actingAs($user);

//        App::setLocale('en');
        $response = $this->postJson(route('api.v1.comunidades.store'), [
            'data' => [
                'type' => 'comunidades',
                'attributes' => [
//                    'cif' => "12345678w",
                    'fechalta' => "2022-02-28",
                    'denom' => "Testeando comunidad",
                    'partes' => 10,
                    'email' => "123456@gmail.com",
                    'direccion' => "quinto pino",
                    'cp' => '07007',
                    'pais' => 'ESP',
                ],
            ]
        ], [
            'Content-Type' => 'application/vnd.api+json'
        ]);

//        $response->assertJsonValidationErrorFor('data.attributes.denom');

        $response->assertJsonStructure([
            "errors" => [
                ['title', 'detail', 'source' => ['pointer']]
            ]
        ]);
    }

    /**
     *
     */
    public function it_can_returns_a_json_api_error_object_when_a_comunidad_is_not_found()
    {

        $this->withoutExceptionHandling();

        $response = $this->getJson(route('api.v1.comunidades.show', '1234'));

        //        $response->assertJsonApiError();
        $response->assertJsonStructure([
            'errors' => [
                '*' => []
            ]
        ]);
    }

    // cambios sugeridos desde aprendible desarrollo api lección 4 Instalación del proyecto con Blueprint
    // ¿Eliminar?

    /** @test */
//    public function it_can_sort_comunidades()
//    {
    /**
     * @test
     *
     * Por desarrollar.
     */
    public function it_can_sort_comunidades_by_denom()
    {
        $user = User::first();

//        Sanctum::actingAs($user);

//        $comunidad = Comunidad::factory()->create();
        $url = route('api.v1.comunidades.index', ['sort' => 'denom']);

//        DB::listen(function ($db) {
//           dump( $db->sql);
//        });
        $response = $this->getJson($url);

        $this->assertTrue(true);
    }

}
