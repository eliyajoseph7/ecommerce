<?php

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
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('rank');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->timestamps();
        });

        // insert initial data
        DB::table('main_categories')->insert(
            [
                [
                    'name' => 'Electronics',
                    'slug' => 'electronics',
                    'rank' => '1',
                ],
                [
                    'name' => 'Hardware & Construction',
                    'slug' => 'hardware_and_construction',
                    'rank' => '2',
                ],
                [
                    'name' => 'Real Estates',
                    'slug' => 'real_estates',
                    'rank' => '3',
                ],
                [
                    'name' => 'Vehicles and Trucks',
                    'slug' => 'vehicles_and_trucks',
                    'rank' => '4',
                ],
                [
                    'name' => 'Equipment & Machinery',
                    'slug' => 'equipment_and_machinery',
                    'rank' => '5',
                ],
                [
                    'name' => 'Decorations',
                    'slug' => 'decorations',
                    'rank' => '6',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_categories');
    }
};
