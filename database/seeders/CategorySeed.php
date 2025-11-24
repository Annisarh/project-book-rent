<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //kosongkan dulu isi tabel
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic',
            'novel',
            'fantacy',
            'fiction',
            'mystery',
            'horror',
            'romance',
            'western',
            'animate'
        ];
        foreach ($data as $value) {
            Category::insert([
                'id' => Str::uuid(),
                'name' => $value
            ]);
        }
    }
}
