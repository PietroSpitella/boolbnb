<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++) {
            $new_apartment = new Apartment();
            $new_apartment->user_id = $faker->numberBetween(1, 5);
            $new_apartment->title = $faker->word();
            $new_apartment->slug = $faker->uuid();
            $new_apartment->type = $faker->word();
            $new_apartment->description = $faker->paragraph(2);
            $new_apartment->mq = $faker->numberBetween(30, 300);
            $new_apartment->n_rooms = $faker->numberBetween(1, 5);
            $new_apartment->n_beds = $faker->numberBetween(1, 5);
            $new_apartment->n_baths = $faker->numberBetween(1, 5);
            $new_apartment->n_guests = $faker->numberBetween(1, 5);
            $new_apartment->pet = $faker->words(2, true, false);
            $new_apartment->h_checkin = 'Dopo le 10:00pm';
            $new_apartment->h_checkout ='Prima delle 11:00am';
            $new_apartment->price_night = $faker->randomFloat(2,30,1000);
            $new_apartment->image = $faker->imageUrl(360, 360, 'animals', true);
            $new_apartment->visibility = $faker->numberBetween(0, 1);
            $new_apartment->city = $faker->city();
            $new_apartment->street = $faker->streetName();
            $new_apartment->lat = $faker->latitude(35,50);
            $new_apartment->long = $faker->longitude(7,20);
            $new_apartment->house_number = $faker->bothify('##');
            $new_apartment->save();
        }
    }
}
