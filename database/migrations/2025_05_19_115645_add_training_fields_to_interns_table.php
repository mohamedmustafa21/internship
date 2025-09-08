<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingFieldsToInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interns', function (Blueprint $table) {
            // الحقول الجديدة
            // $table->string('preferred_industry')->nullable();
            $table->enum('military_service_status', ['Completed', 'Exempted', 'Deferred', 'Not Applicable'])->nullable(false);
            $table->string('training_field')->nullable();
            $table->string('industry_first_choice')->nullable();
            $table->string('industry_second_choice')->nullable();
            $table->string('training_fieldd')->nullable();
            $table->string('solidworks_rating')->nullable();
            $table->string('autocad_rating')->nullable();
            // $table->enum('training_10th_of_Ramadan', ['I Agree', 'I Disagree'])->nullable();
            $table->enum('training_ain_sokhna', ['I Agree', 'I Disagree'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interns', function (Blueprint $table) {
            $table->dropColumn([
                'military_service_status',
                'preferred_industry',
                'training_field',
                'industry_first_choice',
                'industry_second_choice',
                'training_fieldd',
                'solidworks_rating',
                'autocad_rating',
                'training_10th_of_Ramadan',
                'training_ain_sokhna'
            ]);
        });
    }
}
