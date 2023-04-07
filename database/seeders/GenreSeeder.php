<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::firstOrCreate(['genre' => 'Action']);
        Genre::firstOrCreate(['genre' => 'Drama']);
        Genre::firstOrCreate(['genre' => 'Comedy']);
        Genre::firstOrCreate(['genre' => 'Crime']);
        Genre::firstOrCreate(['genre' => 'Experimental']);
        Genre::firstOrCreate(['genre' => 'Fantasy']);
        Genre::firstOrCreate(['genre' => 'Historical']);
        Genre::firstOrCreate(['genre' => 'Horror']);
        Genre::firstOrCreate(['genre' => 'Romance']);
        Genre::firstOrCreate(['genre' => 'Science Fiction']);
        Genre::firstOrCreate(['genre' => 'Thriller']);
        Genre::firstOrCreate(['genre' => 'Western']);
    }
}
