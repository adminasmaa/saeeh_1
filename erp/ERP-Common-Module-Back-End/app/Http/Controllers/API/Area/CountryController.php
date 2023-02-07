<?php

namespace App\Http\Controllers\API\Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Area\CountryRequest;
use App\Http\Resources\API\Area\CountryResource;
use App\Models\Area\Country;
use App\Repositories\IRepositories\Area\ICountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator};
use App\Helpers\JsonResponse;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(ICountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function index()
    {
        try {
            $all_regions = CountryResource::collection($this->countryRepository->all());
            return $all_regions->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function store(CountryRequest $request)
    {
        try {
            $model = $this->countryRepository->create($request->validated());
            $country = new CountryResource($model);
            return $country->additional(JsonResponse::savedSuccessfully());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function show(Country $country)
    {
        try {
            $country = new CountryResource($country);
            return $country->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Country $country
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */    public function update(Country $country, CountryRequest $request)
{
    try {
        $this->countryRepository->update($request->validated(), $country->id);
        return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY), null);
    } catch (\Exception $e) {
        return JsonResponse::respondError($e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function destroy(Country $country)
    {
        try {
            $this->countryRepository->delete($country->id);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * navigation.
     *
     * @param Country $country , case of navigation
     * @return object
     * @auth A.Soliman
     */
    public function navigate(Request $request, Country $country)
    {
        try {
            if (!in_array($request->case, ['previous', 'next', 'first', 'last']))
                return JsonResponse::respondError('The Navigate case should be one of previous,next,first,last', 422);
            $country = new CountryResource($this->countryRepository->navigate($country->id, $request->case));
            return $country->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
    public function getCode()
    {
        return JsonResponse::respondSuccess('success', $this->countryRepository->codeGenerator());
    }
}
