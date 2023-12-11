<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JobCategory;
use App\Models\JobSubcategory;

class JobsCategory extends Component
{

    public $jobcategories;
    public $jobsubcategories;

    public $selectedjobCategory = null;


    public function mount()
    {
        $this->jobcategories = JobCategory::all();
        $this->jobsubcategories = collect();

    }

    public function render()
    {
        return view('livewire.jobs-category');
    }


    public function updatedselectedjobCategory($jobcategories)
    {
        if (!is_null($jobcategories)) {
            $this->jobsubcategories = JobSubcategory::where('job_category_id', $jobcategories)->get();
        }
    }

}



