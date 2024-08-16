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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('name');
            $table->longText('description');
            $table->date('deadline');
            $table->string('file');
            $table->integer('project_type_id');
            $table->integer('no_of_pages');
            $table->tinyInteger('status')->default(1);
            $table->string('price');
            $table->integer('user_id');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
