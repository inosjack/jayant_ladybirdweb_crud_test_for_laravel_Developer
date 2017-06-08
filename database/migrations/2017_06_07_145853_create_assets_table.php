<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->enum('type',["Software", "Hardware"]);
            $table->string('serial_number',50)->unique();
            $table->string('asset_value',30);
            $table->string('description',255);
            $table->enum("condition", ["Functional", "Damaged", "Stolen","Retired"])->default("Functional");
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
        Schema::dropIfExists('assets');
    }
}
