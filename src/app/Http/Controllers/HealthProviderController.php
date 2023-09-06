<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enum\UserRole;
use App\Models\HealthProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\HealthProviderRequest;

class HealthProviderController extends Controller
{
    public function adminCreateHealthProvider(HealthProviderRequest $request)
    {

        try {
            $data = $request->all();

            $data = (object)$data;

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

            return $this->successResponder($healthcare_provider, 201, 'Health provider succesfully created');
        } catch (\Throwable $th) {
            return $this->errorResponder([], 400, $th->getMessage());
        }
    }
}
