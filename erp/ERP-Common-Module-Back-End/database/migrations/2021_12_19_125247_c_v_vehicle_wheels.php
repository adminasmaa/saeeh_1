<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CVVehicleWheels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        create view c_v_Vehicle_wheels  as
        SELECT c_vehicle_wheels.id,
               c_vehicle_wheels.serial_no,
               c_vehicle_wheels.size,
               c_vehicle_wheels.description,
               c_vehicle_wheels.type,
               c_vehicle_wheels.wheel_date,
               c_vehicle_wheels.state,
               c_vehicle_wheels.prod_date,
               c_vehicle_wheels.notes,
               c_vehicle_wheels.guaranty_qty,
               c_vehicle_wheels.is_active,
               c_vehicle_wheels.vehicle_id,
               c_vehicle_wheels.wheel_id,
               c_vehicle_wheels.product_id,
               c_vehicle_wheels.warehouse_id,
               c_vehicle_wheels.deleted_at,
               c_vehicle_wheels.created_at,
               c_vehicle_wheels.updated_at,
               w_products.name_ar AS product_name_ar,
               w_products.name_en AS product_name_en,
               w_ware_houses.name_ar AS warehouse_name_ar,
               w_ware_houses.name_en AS warehouse_name_en,
               c_wheels.name_ar AS wheel_name_ar,
               c_wheels.name_en AS wheel_name_en
          FROM ((wharehousetools.c_vehicle_wheels c_vehicle_wheels
                 LEFT OUTER JOIN wharehousetools.c_wheels c_wheels
                    ON (c_vehicle_wheels.wheel_id = c_wheels.id))
                LEFT OUTER JOIN wharehousetools.w_products w_products
                   ON (c_vehicle_wheels.product_id = w_products.id))
               LEFT OUTER JOIN wharehousetools.w_ware_houses w_ware_houses
                  ON (c_vehicle_wheels.warehouse_id = w_ware_houses.id)
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS views_c_v_Vehicle_wheels');
    }
}
