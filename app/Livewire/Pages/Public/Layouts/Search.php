<?php

namespace App\Livewire\Pages\Public\Layouts;

use App\Models\Item;
use Livewire\Component;

class Search extends Component
{
    public $keyword = '';
    public $searching = true;
    public $showResults = false;
    public $results = [];


    public function updatingKeyword()
    {
        // $this->loadData();
    }
    
    public function loadData() {
        $this->searching = true;
        $data = Item::publicSearch($this->keyword)->with(['category'])->limit(100)->get();
        $this->results = collect($data->groupBy(function($qs) {
            return $qs->category->name;
        }));
        // dd($this->results);
        $this->searching = false;
        
    }

    public function render()
    {
        return view('livewire.pages.public.layouts.search');
    }
}
