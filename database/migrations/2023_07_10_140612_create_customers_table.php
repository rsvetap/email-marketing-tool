<?php

use App\Enums\CustomerSexEnum;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('sex', CustomerSexEnum::values())->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('customer_to_group', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained('customer_groups')->onDelete('cascade');
            $table->primary(['customer_id', 'group_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_to_group');
        Schema::dropIfExists('customer_groups');
        Schema::dropIfExists('customers');

    }
};
