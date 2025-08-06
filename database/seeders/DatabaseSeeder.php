<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Role;
use App\Models\Slug;
use App\Models\User;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]); 
        Role::create([
            'name' => 'admin',
            'description' => 'Administrator role with full access',
        ]);
        Role::create([
            'name' => 'editor',
            'description' => 'Editor role with limited access',
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'Viewer role with read-only access',
        ]);    
        Level::create([
            'name' => 'Beginner',
            'description' => 'Suitable for those new to the topic.',
        ]);
        Level::create([
            'name' => 'Intermediate',
            'description' => 'For those with some experience.',
        ]);
        Level::create([
            'name' => 'Advanced',
            'description' => 'For those with significant experience.',
        ]);
        Slug::create([
            'slug' => 'AI',
            'description' => 'This is an ai related articale.',
        ]) ; 
        Slug::create([
            'slug' => 'Laravel',
            'description' => 'This is a laravel related articale.',
        ]);
        Slug::create([
            'slug' => 'PHP',
            'description' => 'This is a PHP related articale.',
        ]);
        Slug::create([
            'slug' => 'JavaScript',
            'description' => 'This is a JavaScript related articale.',
        ]);
        Slug::create([  
            'slug' => 'VueJS',
            'description' => 'This is a VueJS related articale.',
        ]);
        Slug::create([
            'slug' => 'ReactJS',
            'description' => 'This is a ReactJS related articale.',
        ]);
        Slug::create([
            'slug' => 'NodeJS', 
            'description' => 'This is a NodeJS related articale.',
        ]);
        Slug::create([
            'slug' => 'Python',
            'description' => 'This is a Python related articale.',
        ]);
        Slug::create([
            'slug' => 'Django',
            'description' => 'This is a Django related articale.',
        ]);
        Slug::create([
            'slug' => 'Flask',
            'description' => 'This is a Flask related articale.',
        ]);
        Slug::create([
            'slug' => 'Ruby',
            'description' => 'This is a Ruby related articale.',
        ]);
        Slug::create([
            'slug' => 'Rails',
            'description' => 'This is a Rails related articale.',
        ]);
        Slug::create([
            'slug' => 'Machine Learning',           
            'description' => 'This is a Machine Learning related articale.',
        ]);
        Slug::create([
            'slug' => 'Deep Learning',
            'description' => 'This is a Deep Learning related articale.',
        ]);
        Slug::create([
            'slug' => 'Data Science',
            'description' => 'This is a Data Science related articale.',
        ]);
        Slug::create([
            'slug' => 'Big Data',
            'description' => 'This is a Big Data related articale.',
        ]);
        Slug::create([
            'slug' => 'Cloud Computing',
            'description' => 'This is a Cloud Computing related articale.',
        ]);
        Slug::create([
            'slug' => 'DevOps',     
            'description' => 'This is a DevOps related articale.',
        ]);
        Slug::create([
            'slug' => 'Cybersecurity',
            'description' => 'This is a Cybersecurity related articale.',
        ]);
        Slug::create([
            'slug' => 'Blockchain',
            'description' => 'This is a Blockchain related articale.',
        ]);
        Slug::create([
            'slug' => 'Internet of Things',
            'description' => 'This is an Internet of Things related articale.',
        ]);
        Slug::create([
            'slug' => 'Augmented Reality',
            'description' => 'This is an Augmented Reality related articale.',
        ]);
        Slug::create([
            'slug' => 'Virtual Reality',
            'description' => 'This is a Virtual Reality related articale.',
        ]);
        Slug::create([
            'slug' => 'Quantum Computing',          
            'description' => 'This is a Quantum Computing related articale.',
        ]);
        Slug::create([
            'slug' => '5G Technology',
            'description' => 'This is a 5G Technology related articale.',
        ]);
        Slug::create([
            'slug' => 'Edge Computing',
            'description' => 'This is an Edge Computing related articale.',
        ]);
        Slug::create([
            'slug' => 'Natural Language Processing',
            'description' => 'This is a Natural Language Processing related articale.',
        ]);
        Slug::create([
            'slug' => 'Computer Vision',        
            'description' => 'This is a Computer Vision related articale.',
        ]);
        Slug::create([
            'slug' => 'Robotics',   
            'description' => 'This is a Robotics related articale.',
        ]);
        Slug::create([
            'slug' => 'Automation',
            'description' => 'This is an Automation related articale.',
        ]);
        Slug::create([
            'slug' => 'Software Development',
            'description' => 'This is a Software Development related articale.',
        ]);
        Slug::create([
            'slug' => 'Web Development',
            'description' => 'This is a Web Development related articale.',
        ]);
        Slug::create([
            'slug' => 'Mobile Development',
            'description' => 'This is a Mobile Development related articale.',
        ]);
        Slug::create([
            'slug' => 'Game Development',
            'description' => 'This is a Game Development related articale.',
        ]);
        Slug::create([
            'slug' => 'Database Management',
            'description' => 'This is a Database Management related articale.',
        ]);
        Slug::create([
            'slug' => 'Data Visualization',
            'description' => 'This is a Data Visualization related articale.',
        ]);
        Slug::create([
            'slug' => 'Data Analytics',
            'description' => 'This is a Data Analytics related articale.',
        ]);
        Slug::create([
            'slug' => 'Business Intelligence',
            'description' => 'This is a Business Intelligence related articale.',
        ]);
        Slug::create([
            "slug" => 'Digital Marketing',
            'description' => 'This is a Digital Marketing related articale.',
        ]);
        Slug::create([
            'slug' => 'Search Engine Optimization',
            'description' => 'This is a Search Engine Optimization related articale.',
        ]);
        Slug::create([
            'slug' => 'Social Media Marketing',
            'description' => 'This is a Social Media Marketing related articale.',
        ]);
        Slug::create([
            'slug' => 'Content Marketing',
            'description' => 'This is a Content Marketing related articale.',
        ]);
        Slug::create([
            'slug' => 'Email Marketing',
            'description' => 'This is an Email Marketing related articale.',
        ]);
        Slug::create([ 
            'slug'=>"Others" , 
            "description" => "This is a general article that doesn't fit into any specific category.",
        ]);
        }   
}
