<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pages')->insert([
          'slug'  =>  'historique',
          'titre'  =>  'Historique',
          'contenu' =>  'A Rediger',
        ]);
      DB::table('pages')->insert([
        'slug'  =>  'notre-presentation',
        'titre' =>  'Notre Presentation',
        'contenu' =>  'A Rediger'
      ]);
    DB::table('pages')->insert([
      'slug'  =>  'presentation-du-projet',
      'titre' =>  'Presentation du Projet',
      'contenu' =>  'A Rediger'
    ]);
    }
}
