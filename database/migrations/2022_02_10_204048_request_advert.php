<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('request_adverts', function (Blueprint $table) {
            $table->bigIncrements('requestId');

            $table->unsignedBigInteger('job_ref_number');

            $table  ->foreign('job_ref_number')
                    ->references('ref_number')->on('jobs')
                    
                    ->onDelete('cascade');

            $table->integer('no_of_vaccancies');
            $table->string('requested_by');
            $table->timestamp('request_date');
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
            $table->dropForeign('job_ref_number'); //
        });

        Schema::dropIfExists('request_adverts');
    }
}
