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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_id')->nullable();
            $table->string('subscriptions')->nullable();
            $table->string('monthlySearches')->nullable();
            $table->string('views')->nullable();
            $table->string('videosCount')->nullable();
            $table->string('rankWl')->nullable();
            $table->string('premiumVideosCount')->nullable();
            $table->string('whiteLabelVideoCount')->nullable();
            $table->string('rank')->nullable();
            $table->string('rankPremium')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
