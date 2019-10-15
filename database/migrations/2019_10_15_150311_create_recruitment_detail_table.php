<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->text('entitlements')->nullable();
            $table->text('job_requirements')->nullable();
            $table->text('profile_requirement')->nullable();
            $table->text('more_info')->nullable();
            $table->integer('qty')->nullable();
            $table->unsignedInteger('career_id')->default(0);
            $table->unsignedInteger('province_id')->default(0);
            $table->unsignedInteger('form_of_work_id')->default(0);
            $table->integer('min_salary')->default(0);
            $table->integer('max_salary')->default(0);
            $table->timestamp('deadline')->nullable();
            $table->unsignedInteger('company_id')->default(0);
            $table->unsignedInteger('posts_id')->default(0);
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
        Schema::dropIfExists('recruitment_detail');
    }
}
