<?php

use App\Models\Poll;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('options');
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

            //attach an id to the poll - (constrained) = cant be assigned to a poll that doesn't exist
            $table->foreignIdFor(Poll::class)->constrained();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
