<?php

namespace App\Console\Commands;

use App\Http\Controllers\Actions\UpdateItemDiscountController;
use Illuminate\Console\Command;

class UpdateItemDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-item-discount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if discount has expired and remove it from items';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new UpdateItemDiscountController)->updateDiscount();
    }
}
