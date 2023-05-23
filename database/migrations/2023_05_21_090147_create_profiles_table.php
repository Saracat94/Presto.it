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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->date('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->char('cap',5)->nullable();
            $table->string('tel',10)->nullable();
            //vincolo di integrita' referenziale, con il medoto contratto
            // $table->foreignId('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
