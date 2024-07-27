<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'password',
            'birthday' => '2000-10-10',
            'usertype' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'birthday' => '2000-10-10',
            'usertype' => 'admin',
        ]);

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@ehb.be',
             'password' => 'Password!321',
             'birthday' => '2000-10-10',
             'usertype' => 'admin',
         ]);

         \App\Models\Category::factory()->create([
            'category_name' => 'Attack',
         ]);

         \App\Models\Category::factory()->create([
            'category_name' => 'Magic',
         ]);
         
         \App\Models\Category::factory()->create([
            'category_name' => 'Tank',
         ]);
         

         \App\Models\Product::factory()->create([
            'title' => 'Infinity Edge',
            'description' => '+80 attack damage, 
                            +25% critical strike chance, 
                            +40% critical strike damage',
            'image' => 'InfinityEdge.png',
            'price' => '3400',
            'category' => 'Attack',
            'quantity' => '100',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Heartsteel',
            'description' => '+900 health, 
            +200% base health regeneration',
            'image' => 'Heartsteel.png',
            'price' => '3000',
            'category' => 'Tank',
            'quantity' => '100',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Liandrys Torment',
            'description' => '+90 ability power, +300 health',
            'image' => 'Liandrys Torment.png',
            'price' => '3100',
            'category' => 'Magic',
            'quantity' => '10',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Ludens Companion',
            'description' =>    '+95 ability power, 
                                +25 ability haste, 
                                +600 mana',
            'image' => 'Ludens Companion.png',
            'price' => '2900',
            'category' => 'Magic',
            'quantity' => '100',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Profane Hydra',
            'description' =>    '+60 attack damage, 
                                +20 ability haste, 
                                +18 lethality',
            'image' => 'ProfaneHydra.png',
            'price' => '3300',
            'category' => 'Attack',
            'quantity' => '1000',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Rabadons Deathcap',
            'description' =>    '+140 ability power, 
                                UNIQUE – MAGICAL OPUS: Increase your ability power by 35%.',
            'image' => 'RabadonsDeathcap.png',
            'price' => '3600',
            'category' => 'Magic',
            'quantity' => '15',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'Ravenous Hydra',
            'description' =>    '+70 attack damage, 
                                +20 ability haste, 
                                +12% life steal',
            'image' => 'RavenousHydra.png',
            'price' => '3300',
            'category' => 'Attack',
            'quantity' => '25',

         ]);

         \App\Models\Product::factory()->create([
            'title' => 'The Collector',
            'description' =>    '+60 attack damage, 
                                +12 lethality, 
                                +25% critical strike chance',
            'image' => 'The Collector.png',
            'price' => '3200',
            'category' => 'Attack',
            'quantity' => '56',

         ]);
         
         \App\Models\Product::factory()->create([
            'title' => 'Titanic Hydra',
            'description' =>    '+50 attack damage, 
                                +550 health',
            'image' => 'TitanicHydra.png',
            'price' => '3300',
            'category' => 'Attack',
            'quantity' => '65',

         ]);
         
         \App\Models\Product::factory()->create([
            'title' => 'Warmogs armor',
            'description' =>    '+1000 health, 
                                +100% base health regeneration, 
                                +5% movement speed',
            'image' => 'Warmog.png',
            'price' => '3100',
            'category' => 'Tank',
            'quantity' => '89',

         ]);
    }
}
