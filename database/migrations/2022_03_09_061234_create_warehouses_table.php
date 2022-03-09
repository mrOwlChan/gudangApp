<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 50);
            $table->string('code');
            $table->boolean('statusenable')->default(1);
            $table->boolean('statusready')->default(1);
            $table->string('type', 100)->nullable();
            $table->string('desc', 255)->nullable();
            $table->string('address', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse');
    }
}
