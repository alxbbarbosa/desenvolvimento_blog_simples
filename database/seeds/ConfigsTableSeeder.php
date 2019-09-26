<?php

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'title' => 'Mantenha Simplicidade',
            'sub_title' => 'Por Alexandre Bezerra Barbosa',
            'copyright' => '© Copyright 2019 AB Barbosa Serviços e Desenvolvimento',
            'link_facebook' => null,
            'link_twitter' => null,
            'link_google_plus' => null,
            'link_instagram' => null,
            'link_github' => null,
            'link_flickr' => null,
            'link_skype' => null,
            'paragraph_title_footer' => "SOBRE MANTENHA A SIMPLICIDADE",
            'paragraph_footer' => "This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.

Lorem ipsum Sed nulla deserunt voluptate elit occaecat culpa cupidatat sit irure sint sint incididunt cupidatat esse in Ut sed commodo tempor consequat culpa fugiat incididunt.",
            'allows_registration' => true,
        ]);
    }
}