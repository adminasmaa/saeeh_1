<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\{Api\Unit\UnitController,
    ExampleController,
    API\Card\DocumentTypeController,
    API\Vehicle\VehicleDataController,
    API\Vehicle\VehicleTypeController,
    API\Vehicle\WheelController,
    API\Area\RegionController,
    API\Area\CountryController,
    API\CarClassification\CarClassificationController,
    API\CarStatus\CarStatusController,
    API\DocumentIssuer\DocumentIssuerController,
    API\Localization\DistrictController,

    API\Currency\CurrencyController

};


use App\Http\Controllers\API\Payment\PaymentTypeController;

Route::group(['middleware' => ['cors', 'Language']], function () {
    Route::get('languages/{lang}', [\App\Http\Controllers\LanguageController::class, 'update']);


    Route::apiResource('examples', ExampleController::class);
    Route::get('examples/navigation/{examples}', [ExampleController::class, 'navigate']);
    Route::get('districts/code', [DistrictController::class, 'getCode']);
    Route::apiResource("districts", DistrictController::class);

    //Regions
    Route::get('regions/code', [RegionController::class, 'getCode']);
    Route::apiResource('regions', RegionController::class);
    Route::get('regions/navigation/{region}', [RegionController::class, 'navigate']);

    //Countries
    Route::get('countries/code', [CountryController::class, 'getCode']);
    Route::apiResource('countries', CountryController::class);
    Route::get('countries/navigation/{country}', [CountryController::class, 'navigate']);


    //Document Types
    Route::post('document-types/type', [DocumentTypeController::class, 'index']);
    Route::get('document-types/code', [DocumentTypeController::class, 'getCode']);
    Route::get('document-types/navigation/{document_type}', [DocumentTypeController::class, 'navigate']);
    Route::apiResource('document-types', DocumentTypeController::class);


    //Payment Types
    Route::get('payment-types/code', [PaymentTypeController::class, 'getCode']);
    Route::get('payment-types/navigation/{paymentType}', [PaymentTypeController::class, 'navigate']);
    Route::apiResource('payment-types', PaymentTypeController::class);


    //Vehicle Types
    Route::post('vehicle-types/type', [VehicleTypeController::class, 'index']);
    Route::get('vehicle-types/code', [VehicleTypeController::class, 'getCode']);
    Route::get('vehicle-types/export', [VehicleTypeController::class, 'export']);
    Route::get('vehicle-types/navigation/{vehicle_type}', [VehicleTypeController::class, 'navigate']);
    Route::apiResource('vehicle-types', VehicleTypeController::class);

    //Wheel Types
    Route::post('wheel-types/type', [WheelController::class, 'index']);
    Route::get('wheel-types/code', [WheelController::class, 'getCode']);
    Route::get('wheel-types/navigation/{wheel_type}', [WheelController::class, 'navigate']);
    Route::apiResource('wheel-types', WheelController::class);

    //VehicleData

    Route::post('vehicle-data/type', [VehicleDataController::class, 'index']);
    Route::get('vehicle-data/get-cover', [VehicleDataController::class, 'getCover']);
    Route::get('vehicle-data/code', [VehicleDataController::class, 'getCode']);
    Route::get('vehicle-data/navigation/{vehicle_data}', [VehicleDataController::class, 'navigate']);
    Route::apiResource('vehicle-data', VehicleDataController::class);

    //carstatus


    Route::get('car-status/code', [CarStatusController::class, 'getCode']);
    Route::get('car-status/navigation/{car-status}', [CarStatusController::class, 'navigate']);
    Route::apiResource('car-status', CarStatusController::class);

    //document-issuer
    Route::get('document-issuer/code', [DocumentIssuerController::class, 'getCode']);
    Route::apiResource('document-issuer', DocumentIssuerController::class);

    Route::get('car-classifications/code', [CarClassificationController::class, 'getCode']);
    Route::apiResource('car-classifications', CarClassificationController::class);


    //currency
    Route::get('currencies/code', [CurrencyController::class, 'getCode']);
    Route::get('currencies/navigation/{currency}', [CurrencyController::class, 'navigate']);
    Route::apiResource('currencies', CurrencyController::class);
    // Unit
    Route::get('units/code', [UnitController::class, 'getCode']);
    Route::get('units/navigation/{unit}', [UnitController::class, 'navigate']);
    Route::apiResource('units', UnitController::class);


});
