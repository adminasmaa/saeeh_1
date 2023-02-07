<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVehicleWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_vehicle_wheels', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no')->nullable();
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->date('wheel_date')->nullable();
            $table->string('state')->nullable();
            $table->date('prod_date')->nullable();
            $table->string('notes')->nullable();
            $table->double('guaranty_qty')->nullable();
            $table->boolean('is_active')->default(1);
            $table->foreignId('vehicle_id')->nullable()->constrained('c_vehicle_data');
            $table->foreignId('wheel_id')->nullable()->constrained('c_wheels');
            // $table->foreignId('product_id')->nullable()->constrained('w_products');
            // $table->foreignId('warehouse_id')->nullable()->constrained('w_ware_houses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_vehicle_wheels');
    }
}
