<?php

use App\Models\Promotion;
use App\Models\Room_Type;
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
        Schema::create('room__type__promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Room_Type::class)->constrained();
            $table->foreignIdFor(Promotion::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room__type__promotions');
    }
};
