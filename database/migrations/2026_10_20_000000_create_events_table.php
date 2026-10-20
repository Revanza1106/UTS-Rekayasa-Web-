<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('organizer');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->decimal('ticket_price', 12, 2)->default(0);
            $table->text('description');
            $table->string('banner');
            $table->timestamps();
            $table->index('date');
            $table->index('location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
