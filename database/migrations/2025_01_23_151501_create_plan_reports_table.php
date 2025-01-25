<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_reports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('week1');
            $table->text('week2');
            $table->text('week3');
            $table->text('week4');
            $table->text('week5');
            $table->text('week6');
            $table->text('week7')->nullable();
            $table->text('week8')->nullable();
            $table->text('org_sub_name')->nullable();
            $table->text('org_sub_email')->nullable();
            $table->text('org_sub_phone')->nullable();
            $table->text('org_sub_department')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('user_id')->unique(); // Each user can have only one plan report
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_reports');
    }
};
