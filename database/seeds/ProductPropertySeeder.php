<?php

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPropertySeeder extends Seeder
{
    const ITERATIONS = 20;

    private $iterations;

    public function __construct()
    {
        $this->iterations = self::ITERATIONS;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        do {
            DB::table('product_property')->insert([
                'product_id' => Product::inRandomOrder()->first()->id,
                'property_id' => Property::inRandomOrder()->first()->id,
                'created_at' => \Carbon\Carbon::now(new DateTimeZone('Europe/Moscow')),
                'updated_at' => \Carbon\Carbon::now(new DateTimeZone('Europe/Moscow')),
            ]);

            $this->iterations--;

        } while ($this->iterations != 0);
    }
}
