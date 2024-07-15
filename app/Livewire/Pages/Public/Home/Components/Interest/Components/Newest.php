<?php

namespace App\Livewire\Pages\Public\Home\Components\Interest\Components;

use App\Models\Item;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class Newest extends Component
{
    public $loading = true;
    public $newest = [];

    public function render()
    {
        
        return view('livewire.pages.public.home.components.interest.components.newest');
    }

    #[On('fetch_newest_products')]
    public function fetchNewProducts() {

        // try {
        //     $response = Http::get('https://5e98afff5eabe7001681c474.mockapi.io/api/v1/products');
        //     $data = $response->getBody()->getContents();
        //     $this->newest = json_decode($data);
        // } catch(\Throwable $e) {
        //     logs($e);
        // }
        $this->newest = Item::where('status', 'active')->latest()->get();

        $this->loading = false;

    }
}
