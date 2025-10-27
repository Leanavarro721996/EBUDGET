<?php

namespace App\Livewire\Pages\Budget;
use App\Models\newcateg;
use App\Models\supplemental;
use Livewire\Component;
use App\Models\histories;
use Illuminate\Support\Facades\Auth;


class Supplement extends Component
{
    public $view, $CATEGORY, $PPA,$RESOURCES,$RESPONSIBLE_UNIT,$ACCOUNT_CODE,$OBJECT_EXPENDITURE,$SOURCE_FUND,$id;
    public $FIRST,$SECOND,$THIRD,$FOURTH;
    public $FIRSTREM,$SECONDREM,$THIRDREM,$FOURTHREM;
    public $TOTAL= '';
    public $NOTE = '';
    public$REMAINING_BALANCE= '';
    public$FIRSTResult,$SECONDResult,$THIRDResult,$FOURTHResult;
    public$lessFIRST,$lessSECOND,$lessTHIRD,$lessFOURTH;
    public $supplementless;
    public $supplementResult;
    public $supplementalless;
    public $supid;
    public $SUPPLEMENT;
    public $maxColspan;
    public $supplementals;
    public$Title;
    public$Department;

    public $Year;
    public $AIPRefCode;

    public $created_at;
    public $addnew;
    public $files;

    public $addingdetails;
    public $add;
    public $supp;
    
    public $FIRSTadd, $SECONDadd, $THIRDadd, $FOURTHadd, $uniqueID,$Date;
    public $total1, $total2, $total3, $total4, $totalapp;
    public $total5, $total6, $total7, $total8;
    public $newcateg;
    public $less1;
    public $category_id , $name, $amount,$supplemental;
    public $updateMode = false;
    public $hasSupplementals = false;
    public $TotalResult;
    public $FIRST1,$SECOND2,$THIRD3,$FOURTH4,$categoryid;
    public $query;

 
    protected $rules = [
        'FIRST' => 'numeric|min:0',
        'lessFIRST' => 'numeric|min:0|gte:FIRST',
        'SECOND' => 'numeric|min:0',
        'lessSECOND' => 'numeric|min:0|gte:SECOND',
        'SECOND' => 'numeric|min:0',
        'lessSECOND' => 'numeric|min:0|gte:SECOND',
    ];

    public function render()
    {
        $this ->supp = supplemental::all() ;
        // $this ->view = newcateg::all() ;
        $query = newcateg::query(); // Use query() instead of all()
    
        if ($this->query) {
            $query->where(function ($q) {
                $q->where('AIPRefCode', 'like', '%' . $this->query . '%')
                    ->orWhere('PPA', 'like', '%' . $this->query . '%');
                    
            });
        }
      
        // $this->view = $query->get(); // Remove unnecessary get() here
        $this->view = $query->orderBy('created_at', 'desc')->get();
        return view('livewire.pages.budget.supplement');
    }

    public function search()
    {
        {
            $this->view = newcateg::where('AIPRefCode', 'like', '%' . $this->query . '%')
                ->orWhere('PPA', 'like', '%' . $this->query . '%')
                ->orWhere('ACCOUNT_CODE', 'like', '%' . $this->query . '%')
                ->orWhere('RESPONSIBLE_UNIT', 'like', '%' . $this->query . '%')

                ->get();
    
            // Check if no results were found
            if ($this->view->isEmpty()) {
                // You can add a message or perform other actions here
                // For example, you can set a flag to display a message in the Blade view
                // $this->emit('noResultsFound');
            }
        } 
        $this->render();
    } 


    private function resetInputFields(){
      
        $this->PPA = '';
        $this->RESOURCES = '';
        $this->RESPONSIBLE_UNIT = '';
        $this->OBJECT_EXPENDITURE = '';
        $this->SOURCE_FUND = '';
        $this->FIRST = ''; 
        $this->FIRSTREM = ''; 
        $this-> SECOND = '';
        $this-> SECONDREM = '';
        $this-> THIRD = '';
        $this-> THIRDREM = '';
        $this-> FOURTH = '';
        $this-> FOURTHREM = '';
        $this-> TOTAL= '';
        $this-> NOTE = '';
        $this->REMAINING_BALANCE = '';
       
 
    }

    public function edit($id,$FIRST,$SECOND,$THIRD,$FOURTH,$created_at)
    {
        $file = newcateg::findOrFail($id);
        $this->id = $id;
        $this->CATEGORY = $file->CATEGORY;
        $this->AIPRefCode = $file->AIPRefCode;
        $this->PPA= $file->PPA;
        $this->RESOURCES= $file->RESOURCES;
        $this->RESPONSIBLE_UNIT= $file->RESPONSIBLE_UNIT;
        $this->ACCOUNT_CODE = $file->ACCOUNT_CODE;
        $this->OBJECT_EXPENDITURE= $file->OBJECT_EXPENDITURE;
        $this->SOURCE_FUND= $file->SOURCE_FUND;
        $this->FIRST= $file->FIRST;
        $this->SECOND= $file->SECOND;
        $this->THIRD= $file->THIRD;
        $this->FOURTH= $file->FOURTH;
        $this->TOTAL= $file->TOTAL;
        $this->REMAINING_BALANCE= $file->REMAINING_BALANCE;
        $this->FIRSTREM= $file->FIRSTREM;
        $this->SECONDREM= $file->SECONDREM;
        $this->THIRDREM= $file->THIRDREM;
        $this->FOURTHREM= $file->FOURTHREM;
        $this->NOTE= $file->NOTE;
        $this->created_at= $file->created_at;
        
        $this->updateMode = true;  
    }


    public function save1()
    {
        // dd('ghg');
        $validatedData = $this->validate([
            'category_id' => '',
            'name' => 'required',
            'amount' => '',
            'FIRST1'=> '',
            'SECOND2'=> '',
            'THIRD3'=> '',
            'FOURTH4' => '',
         
           
        ]);
        $supp = supplemental::create([
            'category_id' => $this->id,
            'name' => $this->name,
            'FIRST1'=> $this->FIRST1,
            'SECOND2'=> $this->SECOND2,
            'THIRD3'=> $this->THIRD3,
            'FOURTH4' => $this->FOURTH4,
          
         
        ]);
                                                                
        session()->flash('message', 'Added Successfully.');
        $this->resetInputFields1();
        $this->dispatch('created'); 
    }  
    
    public function resetInputFields1()
{
   
    $this->name = '';
    $this->FIRST1= '';
     $this->SECOND2= '';
   $this->THIRD3= '';
   $this->FOURTH4= '';
  
}

    public function supplemental_table()
{
    return $this->hasMany(supplemental::class);
}


   
    public function editsupp($id)
    {
        $supp = supplemental::findOrFail($id);
        $this->id = $id;
        $this->category_id = $supp->category_id; 
        $this->name = $supp->name;
        $this->FIRST1 = $supp->FIRST1;
        $this->SECOND2 = $supp->SECOND2; 
        $this->THIRD3 = $supp->THIRD3;
        $this->FOURTH4 = $supp->FOURTH4;
        $this->updateMode = true;  
    }
    public function editnewcateg($id)
    {
        $file = newcateg::findOrFail($id);
        $this->id = $id;
       
        
        $this->updateMode = true;  
    }
    
        public function savehistory()
        {
            $validatedData = $this->validate([
                'categoryid' => '',
                'FIRST1' => '',
                'THIRD3' => '',
                'SECOND2' => '',
                'FOURTH4' => '',
               
      
            ]);
            $add = histories::create([
               'categoryid'  => $this->id,
                'FIRST' =>$this->FIRST1,
                'THIRD' =>$this->THIRD3,
                'SECOND' => $this->SECOND2,
                'FOURTH' =>$this->FOURTH4, 
                'FIRSTREM' =>$this->FIRSTREM,
                'THIRDREM' =>$this->THIRDREM,
                'SECONDREM' => $this->SECONDREM,
                'FOURTHREM' =>$this->FOURTHREM,
                'PPA'=>$this->PPA,
                'AIPRefCode'=>$this->AIPRefCode,
                'process' => "Added the supplemental amount for the ",
                 'name' => Auth::user()->name, 
               
            ]);
        
        // session()->flash('message', 'Added Successfully.');   
        // $this->resetInputFields1();
        // $this->dispatch('created'); 
        // return redirect()->route('view', $this->addnew->id);  
        
    } 
    public function storedata()
    {
        $this->savehistory();
        $this->save1();
      
    }
   
    
    public function updatesupplemental()
    {
        $validatedData = $this->validate([

            'name' => '',
            'FIRST1'=> '',
            'SECOND2'=> '',  
            'THIRD3'=> '',
            'FOURTH4' => '',
        ]);

  
        $supp = supplemental::find($this->id);
        $supp->update([
           
            'name' => $this->name,
            'FIRST1'=> $this->FIRST1,
            'SECOND2'=> $this->SECOND2,
            'THIRD3'=> $this->THIRD3,
            'FOURTH4' => $this->FOURTH4,
           
        ]);

        $this->updateMode = false;    
  
        session()->flash('message', 'Updated!');
        $this->resetInputFields();
       
    }
    public function editsupplement($id)
    {
        $supp = supplemental::findOrFail($id);
        $this->id =  $supp->id;
        $this->category_id = $supp->category_id; 
        $this->name = $supp->name;
        $this->updateMode = true;  
    }
   
    
public function updatehistory()
    {
        $validatedData = $this->validate([

            'categoryid' => '',
            'FIRST1' => '',
            'THIRD3' => '',
            'SECOND2' => '',
            'FOURTH4' => '',
        ]);

  
        $add = histories::find($this->id);
        $add->update([
           
           'categoryid'  => $this->id,
            'FIRST' =>$this->FIRST1,
            'THIRD' =>$this->THIRD3,
            'SECOND' => $this->SECOND2,
            'FOURTH' =>$this->FOURTH4, 
            'PPA'=>$this->PPA,
            'AIPRefCode'=>$this->AIPRefCode,
            'process' => "Updated supplement amount for the ",
             'name' => Auth::user()->name, 
           
        ]);

        $this->updateMode = false;    
  
        // session()->flash('message', 'Updated!');
        $this->resetInputFields();
       
    }
    
    public function storedata1()
    {
        $this->updatehistory();
        $this->updatesupplemental();
    }
    public function cancel1()
    {
        return redirect()->route('supplement');   
    }
  
}