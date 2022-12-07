<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Associate;
use App\Models\AssociateData;


class Associates extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $nameSearch;
    public $languageSearch;
    public $skillsSearch;
    public $locationSearch;
    public function render()
    {
//        dump($this->nameSearch);
        return view('livewire.associates', [
            'associates' => Associate::with('associateData')
            ->when($this->nameSearch, function ($query, $nameSearch) {
                return $query->where('first_name', 'LIKE', "%$nameSearch%")
                    ->orWhere('last_name' , 'LIKE', "%$nameSearch%");
            })
            ->when($this->languageSearch, function ($query, $languageSearch) {
                return $query->where('known_languages', 'LIKE', "%$languageSearch%");
            })
            ->when($this->skillsSearch, function ($query, $skillsSearch) {
                return $query->where('search_primary_skillset', 'LIKE', "%$skillsSearch%")
                    ->orWhere('search_secondary_skillsets' , 'LIKE', "%$skillsSearch%")
                    ->orWhere('search_qualifications' , 'LIKE', "%$skillsSearch%");
            })
            ->when($this->locationSearch, function ($query, $locationSearch) {
                return $query->where('city', 'LIKE', "%$locationSearch%")
                    ->orWhere('country' , 'LIKE', "%$locationSearch%")
                    ->orWhere('county' , 'LIKE', "%$locationSearch%")
                    ->orWhere('address1' , 'LIKE', "%$locationSearch%")
                    ->orWhere('address2' , 'LIKE', "%$locationSearch%")
                    ->orWhere('address3' , 'LIKE', "%$locationSearch%")
                    ->orWhere('postcode' , 'LIKE', "%$locationSearch%");
            })
            ->paginate(10)
        ]);
    }
}
