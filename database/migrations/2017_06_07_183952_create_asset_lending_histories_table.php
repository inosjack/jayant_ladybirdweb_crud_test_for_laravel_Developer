<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetLendingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_lending_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id')->unsigned();
            $table->foreign('asset_id')
                ->references('id')->on('assets')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->date('date_given');
            $table->date('return_date')->nullable();
            $table->date('date_of_return')->nullable();
            $table->string('notes',1000);
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
        Schema::dropIfExists('asset_lending_histories');
    }
}
