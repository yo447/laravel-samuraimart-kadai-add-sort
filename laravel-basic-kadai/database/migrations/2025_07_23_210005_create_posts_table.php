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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps('created_at');
            $table->text('content');
            $table->string('title');
            $table->text('t');
            $table->text('h');
           

        });

        Schema::create('posts_table_dummy', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('content');
            $table->string('title');
           $table->string('col2');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
