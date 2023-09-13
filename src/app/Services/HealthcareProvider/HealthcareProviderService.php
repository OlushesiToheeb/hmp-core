<?php

namespace App\Services\HealthcareProvider;

use App\Models\User;
use App\Enum\UserRole;
use App\Models\HealthProvider;

class HealthcareProviderService
{
    public function __construct(private array $healthcareProviderData)
    {
    }


    public function store()
    {

        $data = (object)$this->healthcareProviderData;

        $healthcare_provider = new HealthProvider();
        $healthcare_provider->first_name = $data->first_name;
        $healthcare_provider->last_name = $data->last_name;
        $healthcare_provider->email = $data->email;
        $healthcare_provider->phone = $data->phone;
        $healthcare_provider->date_of_birth = $data->date_of_birth;
        $healthcare_provider->username = $data->username;
        $healthcare_provider->gender = $data->gender;
        $healthcare_provider->specialization = $data->specialization;
        $healthcare_provider->address = $data->address;
        $healthcare_provider->consultation_fee = $data->consultation_fee;

        $user = new User();
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->username = $data->username;
        $user->address = $data->address;
        $user->password = bcrypt($data->email);
        $user->assignRole(UserRole::HEALTH_PROVIDER);
        $user->save();

        $healthcare_provider->user_id = $user->id;
        $healthcare_provider->save();

        return $healthcare_provider;
    }

    public function update(): HealthProvider
    {
        $data = (object)$this->healthcareProviderData;

        $healthcare_provider = HealthProvider::find($data->id);


        $healthcare_provider->first_name = $data->first_name;
        $healthcare_provider->last_name = $data->last_name;
        $healthcare_provider->email = $data->email;
        $healthcare_provider->phone = $data->phone;
        $healthcare_provider->date_of_birth = $data->date_of_birth;
        $healthcare_provider->username = $data->username;
        $healthcare_provider->gender = $data->gender;
        $healthcare_provider->specialization = $data->specialization;
        $healthcare_provider->address = $data->address;
        $healthcare_provider->consultation_fee = $data->consultation_fee;

        $user = User::find($healthcare_provider->user_id);
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->phone = $data->phone;
        $user->username = $data->username;
        $user->address = $data->address;
        $user->save();

        $healthcare_provider->user_id = $user->id;
        $healthcare_provider->save();

        return $healthcare_provider;
    }
}
