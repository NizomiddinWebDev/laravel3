<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            "user_id"=>2,
            "tg_id"=>'1987938749',
            "first_name"=>"Nizomiddin",
            "last_name"=>"Maniyev",
            "father_name"=>"Rustamov o'g'li",
            "phone"=>"+998940660299",
            "region"=>"Toshkent viloyati",
            "district"=>"Ohangaron tumani",
            "school"=>"27- maktab",
            "subject"=>"Matematika",
        ]);

        Profile::create([
            "user_id"=>3,
            "tg_id"=>"840023855",
            "first_name"=>"Sobir",
            "last_name"=>"Aliyev",
            "father_name"=>"Jamshid o'g'li",
            "phone"=>"+998940570299",
            "region"=>"Andijon viloyati",
            "district"=>"Andijon tumani",
            "school"=>"38-maktab",
            "subject"=>"Tarix",
        ]);
    }
}
