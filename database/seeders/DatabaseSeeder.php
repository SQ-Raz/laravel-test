<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CommunityLink;
use App\Models\User;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Eliminar los registros existentes en la tabla community_links
        DB::delete('delete from community_links');
        // Eliminar los registros existentes en la tabla channels
        DB::delete('delete from channels');

        // Crea 3 nuevos canales
        Channel::create(['title'=>'React','slug'=>'react','color'=>'red']);
        Channel::create(['title'=>'juegos','slug'=>'juegos','color'=>'green']);
        Channel::create(['title'=>'JS','slug'=>'JS','color'=>'purple']);

        // Crear 50 nuevos registros en la tabla community_links usando el factory
        CommunityLink::factory(50)->create();
    }
}
