<?php

namespace Database\Seeders;




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

      // USERS \\
      \App\Models\User::factory()->create([
         'name' => 'User',
         'email' => 'user@gmail.com',
         'password' => 'password',
         'birthday' => '2000-10-10',
         'usertype' => 'user',
         'about_me' => 'I love League!',
         'profile_pic' => '1722211086.png',
      ]);


      \App\Models\User::factory()->create([
         'name' => 'Lucas',
         'email' => 'Lucas@gmail.com',
         'password' => 'password',
         'birthday' => '2002-09-09',
         'usertype' => 'user',
         'about_me' => 'Student ehb.',
         'profile_pic' => '1722211665.jpg',
      ]);


      \App\Models\User::factory()->create([
         'name' => 'Kevin',
         'email' => 'Kevin@gmail.com',
         'password' => 'password',
         'birthday' => '1999-01-01',
         'usertype' => 'user',
         'about_me' => 'Teacher ehb.',
      ]);

      \App\Models\User::factory()->create([
         'name' => 'Admin',
         'email' => 'admin@gmail.com',
         'password' => 'password',
         'birthday' => '2000-10-10',
         'usertype' => 'admin',
         'about_me' => 'Nothing to say.',
      ]);

      \App\Models\User::factory()->create([
         'name' => 'Admin',
         'email' => 'admin@ehb.be',
         'password' => 'Password!321',
         'birthday' => '2000-10-10',
         'usertype' => 'admin',
         'about_me' => '',
      ]);

      //CATEGORY'S\\
      \App\Models\Category::factory()->create([
         'category_name' => 'Attack',
      ]);

      \App\Models\Category::factory()->create([
         'category_name' => 'Magic',
      ]);

      //PRODUCTS\\
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

      $UserLucas = \App\Models\User::where('name', 'Lucas')->first();
      $UserUser = \App\Models\User::where('name', 'User')->first();
      //CONTACTS\\
      \App\Models\Contact::factory()->create([
         'user_id'=> $UserLucas->id,
         'name' => 'Ava',
         'email' => 'Ava@gmail.com',
         'message' => 'How can I make more gold?',
         'response' => 'You cannot make more gold for te moment.',
         'status' => 'Done',
      ]);

      \App\Models\Contact::factory()->create([
         'user_id'=> $UserUser->id,
         'name' => 'User',
         'email' => 'user@gmail.com',
         'message' => 'What can I do with the items?',
         'response' => 'For the moment they only serve as collection.',
         'status' => 'Done',

      ]);

  
      //FAQ CATEGORYS\\
      \App\Models\FAQCategory::factory()->create([
         'name' => 'Gold'
      ]);

      \App\Models\FAQCategory::factory()->create([
         'name' => 'Items'
      ]);

      $GoldFAQ = \App\Models\FAQCategory::where('name', 'Gold')->first();
      $ItemsFAQ = \App\Models\FAQCategory::where('name', 'Items')->first();

      //FAQ ITEMS\\
      \App\Models\FAQItem::factory()->create([
         'category_id' => $GoldFAQ->id,
         'question' => 'How to make gold more gold?',
         'answer' => 'You cannot make more gold for te moment.',
      ]);

      \App\Models\FAQItem::factory()->create([
         'category_id' => $GoldFAQ->id,
         'question' => 'Will it be possible to make gold in the future?',
         'answer' => 'Yes we will make it possible.',
      ]);

      \App\Models\FAQItem::factory()->create([
         'category_id' => $ItemsFAQ->id,
         'question' => 'What can I do with the items?',
         'answer' => 'For the moment they only serve as collection.',
      ]);

   }
}
