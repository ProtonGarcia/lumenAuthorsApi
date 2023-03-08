<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        // $this->call([Author::class]);

        // factory
        // Author::factory(Author::class, 50)->create();
        // Author::factory()->
        // count(50)->
        // create();
    
        $this->call([
            AuthorSeeder::class
        ]);
    }
}
