<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

use App\Repositories\IRepositories\{Area\ICountryRepository,
    Area\IRegionRepository,
    ICarStatusRepository,
    ICarClassificationRepository,
    IDocumentIssuerRepository,
    IDocumentTypeRepository,
    IExampleRepository,
    Unit\IUnitRepository,
    IPaymentTypeRepository,
    Localization\IDistrictRepository,
    Vehicle\IVehicleTypeRepository,
    Vehicle\IWheelRepository,
    Vehicle\IVehicleDataRepository,
    Currency\ICurrencyRepository
};
use App\Repositories\Eloquent\{Area\CountryRepository,
    Area\RegionRepository,
    CarStatusRepository,
    DocumentIssuerRepository,
    CarClassificationRepository,
    DocumentTypeRepository,
    ExampleRepository,
    Localization\DistrictRepository,
    Unit\UnitRepository,
    PaymentTypeRepository,
    Vehicle\VehicleTypeRepository,
    Vehicle\WheelRepository,
    Vehicle\VehicleDataRepository,
    Currency\CurrencyRepository,
};
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IExampleRepository::class, ExampleRepository::class);
        //Area
        $this->app->bind(IRegionRepository::class, RegionRepository::class);
        $this->app->bind(ICountryRepository::class, CountryRepository::class);
        
        $this->app->bind(IPaymentTypeRepository::class, PaymentTypeRepository::class);


        $this->app->bind(IDocumentTypeRepository::class, DocumentTypeRepository::class);
        $this->app->bind(IVehicleTypeRepository::class, VehicleTypeRepository::class);
        $this->app->bind(IWheelRepository::class, WheelRepository::class);
        $this->app->bind(ICarStatusRepository::class, CarStatusRepository::class);
        $this->app->bind(ICarClassificationRepository::class, CarClassificationRepository::class);
        $this->app->bind(IDocumentIssuerRepository::class, DocumentIssuerRepository::class);
        $this->app->bind(IVehicleDataRepository::class, VehicleDataRepository::class);
        $this->app->bind(IDistrictRepository::class, DistrictRepository::class);
        $this->app->bind(ICurrencyRepository::class, CurrencyRepository::class);
        $this->app->bind(IUnitRepository::class, UnitRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
