<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_expenses', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('pro_id')->nullable();

            $table->unsignedBigInteger('cat_id')->nullable();

            $table->date('entry_date')->nullable();

            $table->decimal('amount', 15, 2)->nullable();

            $table->string('bank_name')->nullable();

            $table->string('cheque')->nullable();

            $table->string('note')->nullable();

            $table->string('paid_by')->nullable();

            $table->unsignedBigInteger('received_by')->nullable();

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
        Schema::dropIfExists('project_expenses');
    }
}
