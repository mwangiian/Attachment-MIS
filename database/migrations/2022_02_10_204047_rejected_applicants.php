<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RejectedApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_applicants', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table  ->unsignedBigInteger('id_number')
                    ->references('id_number')->on('applicants')
                    ->onDelete('cascade');

            $table->string('vetted_by');
            $table->timestamp('vetted_on')->nullable()->default(null);
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
            $table->dropForeign('id_number'); //
        });
        Schema::dropIfExists('rejected_applicants');
    }
}
