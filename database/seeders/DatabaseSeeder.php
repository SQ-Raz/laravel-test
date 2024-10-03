<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CommunityLink;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Eliminar los registros existentes en la tabla community_links
        DB::delete('delete from community_links');
        
        // Crear 50 nuevos registros en la tabla community_links usando el factory
        CommunityLink::factory(50)->create();
    }
}
