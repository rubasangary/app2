<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adscategory;
use App\Models\Subcategory;
use App\Models\Childcategory;

class DropDown extends Component
{
    public $adscategories;
    public $subcategories;
    public $childcategories;

    public $selectedCategory = null;
    public $selectedSubcategory = null;


    public function mount()
    {
        $this->adscategories = Adscategory::all();
         $this->subcategories = collect();

        $this->subcategories = Subcategory::all();
        $this->childcategories = collect();
    }

    public function render()
    {
        return view('livewire.drop-down');
    }


    public function updatedSelectedCategory($adscategory)
    {
        if (!is_null($adscategory)) {
            $this->subcategories = Subcategory::where('adscategory_id', $adscategory)->get();
        }
    }

    public function updatedSelectedSubcategory($subcategory)
    {
        if (!is_null($subcategory)) {
            $this->childcategories = Childcategory::where('subcategory_id', $subcategory)->get();
        }
    }


}
