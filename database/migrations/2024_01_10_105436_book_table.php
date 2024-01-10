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
        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('book_id');
            $table->string('name',30);
            $table->string('author',30);
            $table->text('description');
            $table->string('status',20);
            $table->integer('issued_copies')->default(0);
            $table->integer('total_inventory')->default(10);
            $table->integer('price');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('book');
    }
};
