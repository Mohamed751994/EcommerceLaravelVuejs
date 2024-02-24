<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' =>'admin',
            'email' =>'admin@nama.com',
            'password' =>Hash::make('12345678')
        ]);

//        DB::table('categories')->insert([
//            [ 'name' => 'بركاني'],
//            [ 'name' => 'اسمنتي']
//         ]);

//         DB::table('products')->insert([
//            [
//             'category_id' => 1,
//             'name' => 'بلك بركاني معزول ابيض',
//             'description' => 'مقاس 20×40',
//             'price' => '2.35',
//             'image'=>'202304040944pro1.png'
//            ],
//            [
//             'category_id' => 1,
//             'name' => 'بلك بركاني عادي 3 فتحة',
//             'description' => 'مقاس 20×40',
//             'price' => '1.5',
//             'image'=>'202304040944pro2.png'
//            ],
//            [
//             'category_id' => 1,
//             'name' => 'بلك بركاني 8 فتحة',
//             'description' => 'مقاس 20×40',
//             'price' => '1.7',
//             'image'=>'202304040944pro3.png'
//            ],
//            [
//             'category_id' => 1,
//             'name' => 'بلك بركاني معزول جفاني',
//             'description' => 'مقاس 20×40',
//             'price' => '3.4',
//             'image'=>'202304040944pro4.png'
//            ],
//            [
//             'category_id' => 2,
//             'name' => 'بلك اسمنتي 3 فتحة',
//             'description' => 'مقاس 15×40',
//             'price' => '1.25',
//             'image'=>'202304040944pro5.png'
//            ],
//            [
//             'category_id' => 2,
//             'name' => 'بلك اسمنتي 3 فتحة',
//             'description' => 'مقاس 10×40',
//             'price' => '1.25',
//             'image'=>'202304040944pro6.png'
//            ],
//         ]);

    }
}
