<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentralServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central_services', function (Blueprint $table) {
            $table->bigIncrements('appointment_letter_id');
            
            $table->unsignedBigInteger('applicant_ID');
            $table->unsignedBigInteger('job_id');

            $table  ->foreign('applicant_ID')
                    ->references('id_number')->on('applicants')
                    ->onDelete('cascade');

            $table->string('created_by');
            $table->string('updated_by');
            
            $table->timestamp('created_on')->nullable();
            
            $table  ->foreign('job_id')
                    ->references('ref_number')->on('jobs')
                    ->onDelete('cascade');
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
            $table->dropForeign('applicant_ID'); //
            $table->dropForeign('job_id'); //
        });

        Schema::dropIfExists('central_services');
    }
}
