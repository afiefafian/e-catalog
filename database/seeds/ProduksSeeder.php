<?php

use Illuminate\Database\Seeder;
use App\User;


class ProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Produk::class, 150)->create([
            'posted_by_id' => $this->getRandomUser()->id,
            'posted_by_name' => $this->getRandomUser()->name,
        ]);
    }

    private function getRandomUser() {
        $get_random_user = User::inRandomOrder()->first();
        return $get_random_user;
    }
}
