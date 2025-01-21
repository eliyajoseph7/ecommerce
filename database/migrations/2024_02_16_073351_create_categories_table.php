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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('status', ['active', 'in active'])->default('active');
            $table->foreignId('main_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // insert some data
        DB::table('categories')->insert(
            [
                [
                    'name' => 'Cars',
                    'slug' => 'cars',
                    'main_category_id' => 4,
                ],
                [
                    'name' => 'Bajaji',
                    'slug' => 'bajaji',
                    'main_category_id' => 4,
                ],
                [
                    'name' => 'Motorcycles',
                    'slug' => 'motocycles',
                    'main_category_id' => 4,
                ],
                [
                    'name' => 'Houses',
                    'slug' => 'houses',
                    'main_category_id' => 3,
                ],
                [
                    'name' => 'Plots',
                    'slug' => 'plots',
                    'main_category_id' => 3,
                ],
                [
                    'name' => 'Hand Tools',
                    'slug' => 'hand_tools',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Outdoor & Garden Tools',
                    'slug' => 'outdoor_and_garden_tools',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Welding',
                    'slug' => 'welding',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Tool Boxes',
                    'slug' => 'tool_boxes',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Tiles',
                    'slug' => 'tiles',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Gypsums',
                    'slug' => 'gypsums',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Bricks',
                    'slug' => 'bricks',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Stones',
                    'slug' => 'stones',
                    'main_category_id' => 2,
                ],
                [
                    'name' => 'Computer & Accessories',
                    'slug' => 'computer_and_accessories',
                    'main_category_id' => 1,
                ],
                [
                    'name' => 'Enterteinments',
                    'slug' => 'entertainments',
                    'main_category_id' => 1,
                ],
                [
                    'name' => 'Office Electronics',
                    'slug' => 'office_electronics',
                    'main_category_id' => 1,
                ],
            ]
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
