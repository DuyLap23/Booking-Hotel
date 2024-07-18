<?php

use App\Models\Amenity;
use App\Models\Room;
use App\Models\Service;
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
        Schema::create('room_amenities', function (Blueprint $table) {
           
            $table->foreignIdFor(Room::class)->constrained();
            $table->foreignIdFor(Amenity::class)->constrained();
            $table->timestamps();

            $table->primary(['room_id', 'amenity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_amenities');
    }
};
