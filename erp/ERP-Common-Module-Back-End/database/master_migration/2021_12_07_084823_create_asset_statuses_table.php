<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_asset_status', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('is_active')->default(true);

            $table->unsignedBigInteger('branch_id')->default(1);
            $table->foreign('branch_id')->references('id')->on('branches');

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
        Schema::dropIfExists('asset_statuses');
    }
}
