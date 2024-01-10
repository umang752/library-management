<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otp_auth', function (Blueprint $table) {
            $table->id('otp_id');
            $table->string('email', 50)->unique();
            $table->integer('otp'); // Define integer column without length
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otp_auth');
    }
};
