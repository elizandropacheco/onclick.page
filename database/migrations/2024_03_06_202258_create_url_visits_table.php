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
        Schema::create('url_visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('url_id');
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
            $table->string('ip_address')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('operating_system_version')->nullable();
            $table->string('referer_url')->nullable();
            $table->string('user_agent');
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->dateTime('visited_at');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('url_visits');
    }
};
