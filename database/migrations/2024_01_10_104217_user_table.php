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
        

        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('fname',30);
            $table->string('lname',20);
            $table->string('email',50)->unique();
            $table->string('password',20);
            $table->string('phone',11);
            $table->string('status',20);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user');
   
    }
};
