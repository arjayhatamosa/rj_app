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
        Schema::create('reservations', function (Blueprint $table) {

            $table->id();

            // Customer / Guest
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Room / Cottage
            $table->foreignId('room_id')
                ->constrained('rooms')
                ->cascadeOnDelete();

            // Reservation dates
            $table->date('check_in');
            $table->date('check_out');

            // Number of guests
            $table->unsignedInteger('guests');

            // Reservation total
            $table->decimal('total_amount', 10, 2);

            // Reservation status
            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Cancelled',
                'Completed'
            ])->default('Pending');

            // Optional notes
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};