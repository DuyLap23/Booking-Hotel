    <?php

use App\Models\Customer;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->constrained();
            $table->foreignIdFor(Room::class)->constrained();
            $table->dateTime('check_in_date');
            $table->dateTime('check_out_date');
            $table->dateTime('booking_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('total_amount');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
