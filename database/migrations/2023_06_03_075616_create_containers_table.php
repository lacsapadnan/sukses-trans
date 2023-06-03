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
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('consignee_name');
            $table->date('register_date');
            $table->date('out_date');
            $table->integer('bl_number');
            $table->integer('register_number');
            $table->integer('container_number');
            $table->string('lift_off');
            $table->integer('repair');
            $table->integer('demurrage');
            $table->string('destination');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};
