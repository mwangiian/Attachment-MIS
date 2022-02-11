<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {

            $table->unsignedBigInteger("id_number")->index();
            $table->unsignedBigInteger("interested_job_number");

            $table->string('surname');
            $table->string('other_name');
            $table->string('institution');
            $table->string('course');

            // interested job number
            $table  ->foreign('interested_job_number')
                    ->references('ref_number')->on('jobs')
                    ->onDelete('cascade');

            // Application letter -  File Name is stored in db if file provided othewise store tet from input
            $table->text('application_letter');

            $table->timestamp("date_of_birth")->nullable();
            $table->string("mobile_number");
            $table->string("address");
            
            // Referral letter -  File Name is stored in db if file provided othewise store tet from input
            $table->text('referral_letter');

            $table->string("next_of_kin_contact");
            $table->string("marital_status");
            $table->string("religion");

            $table->boolean('disability');

            // CV -  File Name 
            $table->string('CV');

            // Insurance cover-  File Name 
            $table->string('insurance_cover');

            
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
            $table->dropForeign('interested_job_number'); //
        });
        Schema::dropIfExists('applicants');
    }
}
