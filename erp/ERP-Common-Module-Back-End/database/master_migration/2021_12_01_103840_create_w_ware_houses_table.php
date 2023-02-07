<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWWareHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w_ware_houses', function (Blueprint $table) {



            $table->id();
            $table->text('name_ar')->nullable();
            $table->text('name_en')->nullable();

            $table->string('address')->nullable();
            $table->string('notes')->nullable();

            $table->string("code")->nullable();
            $table->string('address_map')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();

            // accounting
            $table->foreignId('fp_account_id')->nullable()->constrained('temp_accounting')->onDelete('cascade'); //comment (attach_with_others_accounting)
            $table->foreignId('lp_account_id')->nullable()->constrained('temp_accounting')->onDelete('cascade'); //comment (attach_with_others_accounting)

            $table->boolean('is_active')->default(1); //isActive
            $table->boolean('effect_in_store_value')->default(0)->nullable(); //

            // core

            $table->foreignId('district_id')->nullable()->constrained('c_districts')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained('w_branches')->onDelete('cascade');

            // bill types
            $table->foreignId('in_bill_type_id')->nullable()->constrained('w_invoice_types')->onDelete('cascade');
            $table->foreignId('out_bill_type_id')->nullable()->constrained('w_invoice_types')->onDelete('cascade');


            $table->foreignId('warehouse_keeper_id')->nullable()->constrained('temp_employees')->onDelete('cascade');
            $table->string('warehouse_keeper')->nullable();
            $table->foreignId('driver_id')->nullable()->constrained('temp_employees')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('w_ware_houses')->onDelete('cascade');



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ware_houses');
    }
}
