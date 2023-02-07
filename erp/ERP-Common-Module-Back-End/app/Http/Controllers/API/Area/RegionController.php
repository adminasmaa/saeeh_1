<?php

namespace App\Http\Controllers\API\Area;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Area\RegionRequest;
use App\Http\Resources\API\Area\RegionResource;
use App\Models\Area\Region;
use App\Repositories\IRepositories\Area\IRegionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator};
use App\Helpers\JsonResponse;

class RegionController extends Controller
{
    private $regionRepository;

    public function __construct(IRegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
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
            $all_regions = RegionResource::collection($this->regionRepository->all());
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
    public function store(RegionRequest $request)
    {
        try {
            $model = $this->regionRepository->create($request->validated());
            $region = new RegionResource($model);
            return $region->additional(JsonResponse::savedSuccessfully());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Region $region
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function show(Region $region)
    {
        try {
            $region = new RegionResource($region);
            return $region->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Region $region
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function update(Region $region, RegionRequest $request)
    {
        try {
            $this->regionRepository->update($request->validated(), $region->id);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY), null);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Region $region
     * @return \Illuminate\Http\Response
     * @auth A.Soliman
     */
    public function destroy(Region $region)
    {
        try {
            $this->regionRepository->delete($region->id);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * navigation.
     *
     * @param Region $region , case of navigation
     * @return object
     * @auth A.Soliman
     */
    public function navigate(Request $request, Region $region)
    {
        try {
            if (!in_array($request->case, ['previous', 'next', 'first', 'last']))
                return JsonResponse::respondError('The Navigate case should be one of previous,next,first,last', 422);
            $region = new RegionResource($this->regionRepository->navigate($region->id, $request->case));
            return $region->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
    public function getCode()
    {
        return JsonResponse::respondSuccess('success', $this->regionRepository->codeGenerator());
    }
}
