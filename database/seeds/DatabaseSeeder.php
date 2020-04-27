<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Ppu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
	        DB::table('ppus')->insert([
	            'item'          => $faker->randomDigit,
	            'descricao'     => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'um'            => $faker->randomElement($array = array ('m2','und','m', 'kg', 'sd')),	            
                'quantidade'    => $faker->numberBetween($min = 1000, $max = 10000),
                'valor'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
                'contrato_id'   => 3,
	        ]);
	    }
    }
}
