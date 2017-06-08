<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('employees', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 70);
            $table->string('email', 255);
            $table->string('password', 60);
            $table->enum("gender", ["male", "female"])->default("female");
            $table->string("contact_number", 10)->nullable();;
            $table->date("date_of_birth")->nullable();
            $table->string("designation")->nullable();
            $table->date("joining_date")->nullable();
            $table->date("exit_date")->nullable();
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
        Schema::dropIfExists('employees');
    }
}
