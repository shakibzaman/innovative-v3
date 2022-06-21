<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToProjectExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_expenses', function (Blueprint $table) {
            $table->foreign('pro_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('project_expense_categories')->onDelete('cascade');
            $table->foreign('received_by')->references('id')->on('laboures')->onDelete('cascade');
        });
    }

}
