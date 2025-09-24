<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pelicula;
use Database\Factories\PeliculaFactory;

class CargaVistasPeliculasTest extends TestCase
{
    public function test_carga_vista_inicio()
    {
        $response = $this->get('/');
        $response
            ->assertStatus(200)->assertSee('Películas');
    }
    public function test_carga_vista_lista_peliculas()
    {
        $response = $this->get('/peliculas');
        $response
            ->assertStatus(200)->assertSee('Películas');
    }
    public function test_carga_vista_alta_pelicula()
    {
        $response = $this->get('/pelicula/alta');
        $response
            ->assertStatus(200)->assertSee('Películas');
    }

    public function test_carga_vista_detalle_pelicula()
    {
        $pelicula = Pelicula::factory()->create();
        $response = $this->get("/pelicula/{$pelicula->id}");
        $response
            ->assertStatus(200)->assertSee($pelicula->titulo);
        $pelicula->delete();
    }
    public function test_carga_vista_mantenimiento_pelicula()
    {
        $pelicula = Pelicula::factory()->create();
        $response = $this->get("/pelicula/mantenimiento/{$pelicula->id}");
        $response
            ->assertStatus(200)->assertSee('Películas');
        $pelicula->delete();
    }
}
