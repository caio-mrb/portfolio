<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        
        $projects = [
            ['title' => 'First Project', 'description' => 'This is the first project'],
            ['title' => 'Second Project', 'description' => 'This is the second project'],
            ['title' => 'Third Project', 'description' => 'This is the third project'],
        ];

        foreach ($projects as $project) {
            $videoPath = strtolower(str_replace(' ', '_', $project['title'])) . '.mp4';

            DB::table('projects')->insert([
                'title' => $project['title'],
                'description' => $project['description'],
                'video_path' => $videoPath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
