<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\District;


class CountrySelect extends Component
{
    public $countries;
    public $districts;

    public $selectedCountry = null;


    public function mount()
    {
        $this->countries = Country::all();
         $this->districts = collect();
    }

    public function render()
    {
        return view('livewire.country-select');
    }


    public function updatedselectedCountry($countries)
    {
        if (!is_null($countries)) {
            $this->districts = District::where('country_id', $countries)->get();
        }
    }

}

