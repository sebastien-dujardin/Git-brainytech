<?php

use Illuminate\Database\Seeder;
use App\Event;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Rom Event', 'start_date'=>'2018-06-10', 'end_date'=>'2018-06-15'],
        	['title'=>'Coyala Event', 'start_date'=>'2018-06-11', 'end_date'=>'2017-05-16'],
        	['title'=>'Lara Event', 'start_date'=>'2018-06-16', 'end_date'=>'2018-06-22'],
        ];
        foreach ($data as $key => $value) {
        	Event::create($value);
        }
    }
}
