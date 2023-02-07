<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExampleRequest;
use App\Http\Resources\ExampleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator};
use App\Models\Example;
use App\Repositories\IRepositories\IExampleRepository;
use App\Helpers\JsonResponse;

class ExampleController extends Controller
{
    private $exampleRepository;

    public function __construct(IExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @auth Developer
     */
    public function index()
    {
        try {
            $all_examples = ExampleResource::collection($this->exampleRepository->all());
            return $all_examples->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @auth Developer
     */
    public function store(ExampleRequest $request)
    {
        try {
            $model = $this->exampleRepository->create($request->validated());
            $example = new ExampleResource($model);
            return $example->additional(JsonResponse::savedSuccessfully());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Example $example
     * @return \Illuminate\Http\Response
     * @auth Developer
     */
    public function show(Example $example)
    {
        try {
            $example = new ExampleResource($example);
            return $example->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Example $example
     * @return \Illuminate\Http\Response
     * @auth Developer
     */
    public function update(Example $example, ExampleRequest $request)
    {
        try {
            $this->exampleRepository->update($request->validated(), $example->id);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_UPDATED_SUCCESSFULLY), null);
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Example $example
     * @return \Illuminate\Http\Response
     * @auth Developer
     */
    public
    function destroy(Example $example)
    {
        try {
            $this->exampleRepository->delete($example->id);
            return JsonResponse::respondSuccess(trans(JsonResponse::MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }

    /**
     * navigation.
     *
     * @param Example $example , case of navigation
     * @return object
     * @auth A.Soliman
     */
    public function navigate(Request $request, Example $example)
    {
        try {

            if (!in_array($request->case, ['previous', 'next', 'first', 'last']))
                return JsonResponse::respondError('The Navigate case should be one of previous,next,first,last', 422);
            $example = new ExampleResource($this->exampleRepository->navigate($example->id, $request->case, 'type', $request->type));
            return $example->additional(JsonResponse::success());
        } catch (\Exception $e) {
            return JsonResponse::respondError($e->getMessage());
        }
    }
    public function getCode()
    {
        return JsonResponse::respondSuccess('success', $this->exampleRepository->codeGenerator());
    }
}
