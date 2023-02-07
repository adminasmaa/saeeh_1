<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAssetGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_asset_groups', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name_ar');
            $table->string('name_en');

            $table->enum('relate_with',
                ['Without', 'Account', 'Car', 'Trailer', 'Account With Car', 'Account With Trailer']);

            // Groups Should Be Get From Another Module
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups')->restrictOnDelete();

            // Accounts Should Be Get From Another Module
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('asset_group_accounts')->restrictOnDelete();


            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->restrictOnDelete();


            $table->string('notes')->nullable();
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
        Schema::dropIfExists('f_asset_groups');
    }
}
