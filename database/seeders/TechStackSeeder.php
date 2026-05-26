<?php

namespace Database\Seeders;

use App\Models\TechStack;
use Illuminate\Database\Seeder;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        
        $techStacks = [
            // FRONTEND
            ['name' => 'HTML',         'category' => 'Frontend', 'icon' => 'html5',        'color' => '#E34F26', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'CSS',          'category' => 'Frontend', 'icon' => 'css3',         'color' => '#1572B6', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'JavaScript',   'category' => 'Frontend', 'icon' => 'javascript',   'color' => '#F7DF1E', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'TypeScript',   'category' => 'Frontend', 'icon' => 'typescript',   'color' => '#3178C6', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'React',        'category' => 'Frontend', 'icon' => 'react',        'color' => '#61DAFB', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vue.js',       'category' => 'Frontend', 'icon' => 'vuedotjs',     'color' => '#4FC08D', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Next.js',      'category' => 'Frontend', 'icon' => 'nextdotjs',    'color' => '#000000', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nuxt.js',      'category' => 'Frontend', 'icon' => 'nuxtdotjs',    'color' => '#00DC82', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Angular',      'category' => 'Frontend', 'icon' => 'angular',      'color' => '#DD0031', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Svelte',       'category' => 'Frontend', 'icon' => 'svelte',       'color' => '#FF3E00', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Alpine.js',    'category' => 'Frontend', 'icon' => 'alpinedotjs',  'color' => '#8BC0D0', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'icon' => 'tailwindcss',  'color' => '#06B6D4', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bootstrap',    'category' => 'Frontend', 'icon' => 'bootstrap',    'color' => '#7952B3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Livewire',     'category' => 'Frontend', 'icon' => 'livewire',     'color' => '#FB70A9', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inertia.js',   'category' => 'Frontend', 'icon' => 'inertia',      'color' => '#9553E9', 'created_at' => $now, 'updated_at' => $now],

            // BACKEND
            ['name' => 'PHP',          'category' => 'Backend', 'icon' => 'php',           'color' => '#777BB4', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laravel',      'category' => 'Backend', 'icon' => 'laravel',       'color' => '#FF2D20', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Node.js',      'category' => 'Backend', 'icon' => 'nodedotjs',     'color' => '#339933', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Express',      'category' => 'Backend', 'icon' => 'express',       'color' => '#000000', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'NestJS',       'category' => 'Backend', 'icon' => 'nestjs',        'color' => '#E0234E', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Go',           'category' => 'Backend', 'icon' => 'go',            'color' => '#00ADD8', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Python',       'category' => 'Backend', 'icon' => 'python',        'color' => '#3776AB', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Django',       'category' => 'Backend', 'icon' => 'django',        'color' => '#092E20', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'FastAPI',      'category' => 'Backend', 'icon' => 'fastapi',       'color' => '#009688', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ruby',         'category' => 'Backend', 'icon' => 'ruby',          'color' => '#CC342D', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Java',         'category' => 'Backend', 'icon' => 'java',          'color' => '#007396', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spring Boot',  'category' => 'Backend', 'icon' => 'springboot',    'color' => '#6DB33F', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'REST API',     'category' => 'Backend', 'icon' => 'openapiinitiative', 'color' => '#6BA539', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'GraphQL',      'category' => 'Backend', 'icon' => 'graphql',       'color' => '#E10098', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'WordPress',    'category' => 'Backend', 'icon' => 'wordpress',     'color' => '#21759B', 'created_at' => $now, 'updated_at' => $now],

            // MOBILE
            ['name' => 'Flutter',        'category' => 'Mobile', 'icon' => 'flutter',      'color' => '#02569B', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'React Native',   'category' => 'Mobile', 'icon' => 'react',        'color' => '#61DAFB', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dart',           'category' => 'Mobile', 'icon' => 'dart',         'color' => '#0175C2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Swift',          'category' => 'Mobile', 'icon' => 'swift',        'color' => '#FA7343', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kotlin',         'category' => 'Mobile', 'icon' => 'kotlin',       'color' => '#7F52FF', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ionic',          'category' => 'Mobile', 'icon' => 'ionic',        'color' => '#3880FF', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Capacitor',      'category' => 'Mobile', 'icon' => 'capacitor',    'color' => '#119EFF', 'created_at' => $now, 'updated_at' => $now],

            // DATABASE
            ['name' => 'MySQL',          'category' => 'Database', 'icon' => 'mysql',       'color' => '#4479A1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PostgreSQL',     'category' => 'Database', 'icon' => 'postgresql',  'color' => '#4169E1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MongoDB',        'category' => 'Database', 'icon' => 'mongodb',     'color' => '#47A248', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Redis',          'category' => 'Database', 'icon' => 'redis',       'color' => '#DC382D', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SQLite',         'category' => 'Database', 'icon' => 'sqlite',      'color' => '#003B57', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'MariaDB',        'category' => 'Database', 'icon' => 'mariadb',     'color' => '#003545', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Firebase',       'category' => 'Database', 'icon' => 'firebase',    'color' => '#FFCA28', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Supabase',       'category' => 'Database', 'icon' => 'supabase',    'color' => '#3ECF8E', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PlanetScale',    'category' => 'Database', 'icon' => 'planetscale', 'color' => '#000000', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Turso',          'category' => 'Database', 'icon' => 'turso',       'color' => '#4FF8D2', 'created_at' => $now, 'updated_at' => $now],
        ];

        TechStack::insertOrIgnore($techStacks);
    }
}
