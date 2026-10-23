<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Spotify Stats',
                'summary' => 'Estadísticas de tu Spotify y generador de playlists con tus artistas y canciones top.',
                'body' => 'Aplicación Laravel que se conecta a Spotify mediante OAuth 2.0. Muestra tus artistas y canciones más escuchados por periodo y genera playlists a partir de ellos, guardando un historial en base de datos.',
                'tech_stack' => ['Laravel', 'PHP', 'SQLite', 'Tailwind CSS', 'Spotify API'],
                'repo_url' => 'https://github.com/AlvaroGarcia97/spotify-stats',
                'demo_url' => null,
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Gestor de Biblioteca',
                'summary' => 'Aplicación de escritorio para gestionar préstamos y catálogo de una biblioteca.',
                'body' => 'Proyecto de primer año desarrollado en Java. Permite dar de alta socios, libros y gestionar préstamos y devoluciones con persistencia en base de datos relacional.',
                'tech_stack' => ['Java', 'JavaFX', 'MySQL'],
                'repo_url' => 'https://github.com/AlvaroGarcia97',
                'demo_url' => null,
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'API REST de Pedidos',
                'summary' => 'API REST para gestionar pedidos y stock con autenticación por token.',
                'body' => 'Backend en Laravel que expone endpoints REST para clientes, productos y pedidos. Incluye autenticación, validación de datos y documentación de los endpoints.',
                'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'REST'],
                'repo_url' => 'https://github.com/AlvaroGarcia97',
                'demo_url' => null,
                'featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Panel de tareas con Angular',
                'summary' => 'SPA para organizar tareas y proyectos consumiendo una API REST.',
                'body' => 'Aplicación frontend desarrollada con Angular y TypeScript. Consume una API REST, gestiona el estado de la interfaz y ofrece una experiencia de usuario dinámica sin recargar la página.',
                'tech_stack' => ['Angular', 'TypeScript', 'HTML', 'CSS'],
                'repo_url' => 'https://github.com/AlvaroGarcia97',
                'demo_url' => null,
                'featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Palomitas & Pixeles',
                'summary' => 'Club de cine con buscador, lista de películas, ruleta y juego para adivinar películas.',
                'body' => 'Aplicación Laravel con autenticación propia y consumo de la API de TMDB. Permite buscar películas, guardarlas como pendientes o vistas, puntuarlas y reseñarlas. Incluye una ruleta para elegir qué ver y un juego de 10 rondas para adivinar la película por su carátula, con puntuación guardada.',
                'tech_stack' => ['Laravel', 'PHP', 'SQLite', 'Tailwind CSS', 'TMDB API'],
                'repo_url' => 'https://github.com/AlvaroGarcia97/palomitas-pixeles',
                'demo_url' => null,
                'featured' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                $project,
            );
        }
    }
}
