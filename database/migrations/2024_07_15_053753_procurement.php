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
        //
        Schema::create('procurements', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('alterproc')->nullable();
            $table->smallInteger('type')->nullable();
            $table->integer('parent')->nullable();
            $table->string('issued')->nullable();
            $table->integer('position')->nullable();
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('publish')->nullable();
            $table->smallInteger('author')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('procurements');
    }
};
