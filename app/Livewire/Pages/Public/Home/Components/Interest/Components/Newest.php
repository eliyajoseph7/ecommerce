<?php

namespace App\Livewire\Pages\Public\Home\Components\Interest\Components;

use App\Models\Item;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class Newest extends Component
{
    public $newest = [];
    public $loading = true;
    public $loadMore = false;
    public $counter = 5;
    public $limit = 0;
    public $total = 0;

    public function mount() {
        $this->limit = $this->counter;
    }

    #[On('fetch_products')]
    public function fetchNewProducts() {

        // try {
        //     $response = Http::get('https://5e98afff5eabe7001681c474.mockapi.io/api/v1/products');
        //     $data = $response->getBody()->getContents();
        //     $this->newest = json_decode($data);
        // } catch(\Throwable $e) {
        //     logs($e);
        // }
        $newest = Item::where('status', 'active')->latest();
        $this->total = $newest->count();
        $this->newest = $newest->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->newest) < $this->total) {
            $this->loadMore = true;
        } else {
            $this->loadMore = false;
        }

        $this->loading = false;

    }


    #[On('load_more')]
    public function loadMoreData() {
        $this->loadMore = true;
        $this->loading = true;
        $this->limit += $this->counter;
        $this->fetchNewProducts();
    }

    public function render()
    {
        
        return view('livewire.pages.public.home.components.interest.components.newest');
    }
}
