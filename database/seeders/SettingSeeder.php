<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => "mini blog",
            'address' => "Kayempur, kasba,Brahmanbaria,Bangladesh 3500",
            'description' => "Aut voluptatem et modi est vero. Molestiae quam et tenetur adipisci sunt doloremque ipsa. Dolorum aliquid omnis iusto a veniam. Omnis molestias omnis est adipisci voluptatum. Dolorem totam consectetur...",
            'footer_info' => "Copyright © 2021 All rights reserved",
        ]);
    }
}
