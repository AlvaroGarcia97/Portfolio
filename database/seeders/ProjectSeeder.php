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
                'title' => 'Portfolio personal',
                'summary' => 'Web de portfolio con panel de administración para gestionar proyectos y recibir mensajes de contacto.',
                'body' => 'Aplicación desarrollada con Laravel que sirve como escaparate profesional. Incluye un panel de administración protegido con autenticación, CRUD completo de proyectos y una bandeja de entrada para los mensajes del formulario de contacto.',
                'tech_stack' => ['Laravel', 'PHP', 'Blade', 'Tailwind CSS', 'MySQL'],
                'repo_url' => 'https://github.com/AlvaroGarcia97',
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
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Panel de tareas con Angular',
                'summary' => 'SPA para organizar tareas y proyectos consumiendo una API REST.',
                'body' => 'Aplicación frontend desarrollada con Angular y TypeScript. Consume una API REST, gestiona el estado de la interfaz y ofrece una experiencia de usuario dinámica sin recargar la página.',
                'tech_stack' => ['Angular', 'TypeScript', 'HTML', 'CSS'],
                'repo_url' => 'https://github.com/AlvaroGarcia97',
                'demo_url' => null,
                'featured' => false,
                'sort_order' => 4,
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
