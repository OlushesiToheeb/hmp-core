<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{

    public function run()
    {
        $states = [
            ['name' => "Abia", 'statecode' => "AB"],
            ['name' => "Adamawa", 'statecode' => "AD"],
            ['name' => "Akwa Ibom", 'statecode' => "AK"],
            ['name' => "Anambra", 'statecode' => "AN"],
            ['name' => "Bauchi", 'statecode' => "BA"],
            ['name' => "Bayelsa", 'statecode' => "BY"],
            ['name' => "Benue", 'statecode' => "BN"],
            ['name' => "Borno", 'statecode' => "BO"],
            ['name' => "Cross River", 'statecode' => "CR"],
            ['name' => "Delta", 'statecode' => "DT"],
            ['name' => "Ebonyi", 'statecode' => "EB"],
            ['name' => "Edo", 'statecode' => "ED"],
            ['name' => "Ekiti", 'statecode' => "EK"],
            ['name' => "Enugu", 'statecode' => "EN"],
            ['name' => "FCT", 'statecode' => "FC"],
            ['name' => "Gombe", 'statecode' => "GM"],
            ['name' => "Imo", 'statecode' => "IM"],
            ['name' => "Jigawa", 'statecode' => "JG"],
            ['name' => "Kaduna", 'statecode' => "KD"],
            ['name' => "Kano", 'statecode' => "KN"],
            ['name' => "Katsina", 'statecode' => "KT"],
            ['name' => "Kebbi", 'statecode' => "KB"],
            ['name' => "Kogi", 'statecode' => "KG"],
            ['name' => "Kwara", 'statecode' => "KW"],
            ['name' => "Lagos", 'statecode' => "LA"],
            ['name' => "Nasarawa", 'statecode' => "NS"],
            ['name' => "Niger", 'statecode' => "NG"],
            ['name' => "Ogun", 'statecode' => "OG"],
            ['name' => "Ondo", 'statecode' => "OD"],
            ['name' => "Osun", 'statecode' => "OS"],
            ['name' => "Oyo", 'statecode' => "OY"],
            ['name' => "Plateau", 'statecode' => "PL"],
            ['name' => "Rivers", 'statecode' => "RV"],
            ['name' => "Sokoto", 'statecode' => "SO"],
            ['name' => "Taraba", 'statecode' => "TR"],
            ['name' => "Yobe", 'statecode' => "YB"],
            ['name' => "Zamfara", 'statecode' => "ZM"],
        ];

        foreach ($states as $state) {
            $newLg = State::firstOrNew(['name' =>  $state['name']]);
            $newLg->statecode = $state['statecode'];
            $newLg->name = $state['name'];
            $newLg->save();
        }
    }
}
