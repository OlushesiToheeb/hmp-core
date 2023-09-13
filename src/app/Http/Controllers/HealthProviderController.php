<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\HealthProviderRequest;
use App\Services\HealthcareProvider\HealthcareProviderService;
use Illuminate\Http\JsonResponse;

class HealthProviderController extends Controller
{
    public function adminCreateHealthProvider(HealthProviderRequest $request)
    {
        try {
            $data = $request->all();

            $healthcare_provider = (new HealthcareProviderService($data))->store();
            return $this->successResponder($healthcare_provider, 201, 'Health provider succesfully created');
        } catch (\Throwable $th) {
            return $this->errorResponder([], 400, $th->getMessage());
        }
    }

    public function adminUpdateHealthcareProvider(HealthProviderRequest $request): JsonResponse
    {
        try {
            $data = $request->all();

            $healthcare_provider = (new HealthcareProviderService($data))->store();
            return $this->successResponder($healthcare_provider, 201, 'Health provider succesfully created');
        } catch (\Throwable $th) {
            return $this->errorResponder([], 400, $th->getMessage());
        }
    }
}
