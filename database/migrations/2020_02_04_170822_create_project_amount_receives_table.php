<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectAmountReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_amount_receives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pro_id')->nullable();
            $table->date('entry_date')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('cheque')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('paid_by')->nullable();
            $table->string('received')->nullable();
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
        Schema::dropIfExists('project_amount_receives');
    }
}
