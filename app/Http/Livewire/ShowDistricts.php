<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\District;

class ShowDistricts extends Component
{

    public $districts;

    public function mount()
    {
        $this->districts = District::where('country_id', 2)->get();

    }


    public function render()
    {
        return view('livewire.show-districts');
    }

}
