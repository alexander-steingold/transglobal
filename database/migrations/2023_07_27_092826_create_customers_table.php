<?php

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('email', 50)->nullable()->unique();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50);
            $table->integer('pid')->nullable();
            // $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();;
            $table->foreignIdFor(Country::class)->nullable()->constrained()->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
