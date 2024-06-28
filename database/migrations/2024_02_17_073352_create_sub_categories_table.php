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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // insert some data
        DB::table('sub_categories')->insert(
            array(
                [
                    'name' => 'TV',
                    'slug' => 'tv',
                    'category_id' => 15,
                ],
                [
                    'name' => 'Subwoofer',
                    'slug' => 'subwoofer',
                    'category_id' => 15,
                ],
                [
                    'name' => 'Soundbar',
                    'slug' => 'soundbar',
                    'category_id' => 15,
                ],
                [
                    'name' => 'Radio',
                    'slug' => 'radio',
                    'category_id' => 15,
                ],
                [
                    'name' => 'Projector',
                    'slug' => 'projector',
                    'category_id' => 15,
                ],
                [
                    'name' => 'Desctop',
                    'slug' => 'desctop',
                    'category_id' => 14,
                ],
                [
                    'name' => 'Laptop',
                    'slug' => 'laptop',
                    'category_id' => 14,
                ],
                [
                    'name' => 'Hard Drive',
                    'slug' => 'hard_driver',
                    'category_id' => 14,
                ],
                [
                    'name' => 'Mobile Phone',
                    'slug' => 'mobile_phone',
                    'category_id' => 14,
                ],
                [
                    'name' => 'Batteries & UPS',
                    'slug' => 'batteries_and_ups',
                    'category_id' => 16,
                ],
                [
                    'name' => 'CCTV & Camera',
                    'slug' => 'cctv_and_camera',
                    'category_id' => 16,
                ],
                [
                    'name' => 'Printer & Scanner',
                    'slug' => 'printer_and_scanner',
                    'category_id' => 16,
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
