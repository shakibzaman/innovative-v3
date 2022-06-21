<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();

            $table->string('contract')->nullable();

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->decimal('appr_amount', 15, 2)->nullable();

            $table->decimal('cost_amount', 15, 2)->nullable();

            $table->string('description')->nullable();

            $table->string('status')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
