<?php

namespace App\Livewire\Pages\Budget;
use App\Models\Histories;
use App\Models\newcateg;
use App\Models\supplemental;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class HistoryForm extends Component
{
    public $History,$name,$process,$FIRST,$SECOND,$THIRD,$FOURTH,$created_at,$Histories;
    public $view, $supp;
    public $query;
    public $newcateg;
    
    public function render()
    {
        $query = Histories::query(); // Use query() instead of all()
        $this->History = $query->orderBy('created_at', 'desc')->get();
        if ($this->query) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('PPA', 'like', '%' . $this->query . '%');
                    
            });
        }
      
        // $this->view = $query->get(); // Remove unnecessary get() here
        $this->view = $query->orderBy('created_at', 'desc')->get();
      
        // $this ->History = Histories::all() ;
        $this ->view = newcateg::all() ;
        $this ->supp = supplemental::all() ;
        return view('livewire.pages.budget.history-form');
    }
    public function search()
    {
        {
            $this->History = Histories::where('name', 'like', '%' . $this->query . '%')
                ->orWhere('PPA', 'like', '%' . $this->query . '%')
                

                ->get();
    
            // Check if no results were found
            if ($this->History->isEmpty()) {
                // $this->emit('noResultsFound');
            }
        } 
        $this->render();
    } 

  
}
