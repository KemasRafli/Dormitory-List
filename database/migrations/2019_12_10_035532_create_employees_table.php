<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('employee')->create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('user_id', 191);
            $table->string('full_name', 191);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();;

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
