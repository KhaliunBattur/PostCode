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
        Schema::create('postcodes', function (Blueprint $table) {
            $table->id();

            $table->text('national_local_gov_code');
            $table->text('old_postcode');
            $table->text('postcode');
            $table->text('prefecture_kata');
            $table->text('city_ward_kata');
            $table->text('town_kata');
            $table->text('prefecture_kanji');
            $table->text('city_ward_kanji');
            $table->text('town_kanji');
            $table->text('flg_has_2postcode');
            $table->text('flg_started_with_char');
            $table->text('flg_has_chome');
            $table->text('flg_has_1postcode_represents_2area');
            $table->text('flg_update');
            $table->text('reason_for_update');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postcodes');
    }
};
