<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('ref_number');

            $table->unsignedBigInteger('department_id');

            $table  ->foreign('department_id')
                    ->references('department_id')->on('departments')
                    ->onDelete('cascade');

            $table->integer('no_of_vaccancies');
            $table->string('title');
            $table->text('description');
            $table->timestamp('start_date')->nullable()->default(null);
            $table->timestamp('end_date')->nullable()->default(null);
            $table->timestamp('created_on')->nullable();
            $table->timestamp('application_deadline')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lists', function(Blueprint $table)
        {
            $table->dropForeign('department_id'); //
        });

        Schema::dropIfExists('jobs');
    }
}
