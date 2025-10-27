<?php

namespace App\Livewire\Pages\Budget;
use App\Models\newcateg;
use App\Models\supplemental;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\histories;

class Augmentation extends Component
{
    
    public $id,$category_id , $name, $amount,$supplemental;
    public $view, $CATEGORY, $PPA,$RESOURCES,$RESPONSIBLE_UNIT,$ACCOUNT_CODE,$OBJECT_EXPENDITURE,$SOURCE_FUND,$TOTAL,$NOTE,$REMAINING_BALANCE,$AIPRefCode;
    public $FIRST,$SECOND,$THIRD,$FOURTH;
    public $FIRSTREM,$SECONDREM,$THIRDREM,$FOURTHREM; 
    public $supp;
    public $less1;
    public $TotalResult;
    public $created_at;
    public $selectedview;
    public $category = [];
    public $newcateg;
    public $selectedPPA;
    public  $lessFIRST,$lessSECOND,$lessTHIRD,$lessFOURTH ;
    public  $FIRSTResult, $SECONDResult,$THIRDResult,$FOURTHResult ;        
    public  $FIRSTaug,$SECONDaug,$THIRDaug,$FOURTHaug;
    public  $totalaug1,$totalaug2,$totalaug3,$totalaug4,$totalaug5,$totalaug6,$totalaug7,$totalaug8;
    public  $FIFTHResult,$SIXTHResult,$SEVENResult,$EIGHTResult;
    public $FIRST1,$SECOND2,$THIRD3,$FOURTH4,$categoryid;
    public $supp1Result,$supp2Result,$supp3Result,$supp4Result;
    public $lessupp1, $lessupp2, $lessupp3, $lessupp4;
    public $query;
  
    public $updateMode = false;
    
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
        return view('livewire.pages.budget.augmentation');
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
             
            }
        } 
        $this->render();
    } 
    public function mount()
    {
        $this->category = newcateg::all(); 
      
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
        $this->lessFIRST ='';
        $this->lessSECOND ='';
        $this->lessTHIRD ='';
        $this->lessFOURTH ='';
        $this->FIRSTaug = '';
        $this->SECONDaug = '';
        $this->THIRDaug = '';
        $this->FOURTHaug = '';
       
 
    }
    public function edited($id)
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
        
        $this->updateMode = true;  
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

public function editSelected()
{
    // Fetch the selected PPA data based on the selected ID
    $this->selectedPPA = newcateg::find($this->selectedview);
    
    // Check if the selected PPA exists
    if ($this->selectedPPA) {
        $this->edit(
            $this->selectedPPA->id,
            $this->selectedPPA->FIRST,
            $this->selectedPPA->SECOND,
            $this->selectedPPA->THIRD,
            $this->selectedPPA->FOURTH,
            $this->selectedPPA->created_at
        );
    } else {
      
    }
}
public function Less()
{
    $validatedData = $this->validate([

        'lessFIRST' => 'nullable|numeric|min:0',
        'lessSECOND' => 'nullable|numeric|min:0',
        'lessTHIRD' => 'nullable|numeric|min:0',
        'lessFOURTH' => 'nullable|numeric|min:0',

    ]);
    if ($this->lessFIRST > $this->FIRSTREM) {
        session()->flash('message', 'Amount cannot be more than the First Quarter.');
        return;
    }
    elseif ($this->lessSECOND > $this->SECONDREM) {
        session()->flash('message', 'Amount cannot be more than the Second Quarter.');
        return;
    }
    elseif ($this->lessTHIRD > $this->THIRDREM) {
        session()->flash('message', 'Amount cannot be more than the Third Quarter.');
        return;
    }
    elseif ($this->lessFOURTH > $this->FOURTHREM) {
        session()->flash('message', 'Amount cannot be more than the Fourth Quarter.');
        return;
    }

    $this->FIRSTResult = max(0, intval($this->FIRSTREM) - intval($this->lessFIRST));
    $this->SECONDResult = max(0, intval($this->SECONDREM) - intval($this->lessSECOND));
    $this->THIRDResult = max(0, intval($this->THIRDREM) - intval($this->lessTHIRD));
    $this->FOURTHResult = max(0, intval($this->FOURTHREM) - intval($this->lessFOURTH));

    $this->FIFTHResult = max(0, intval($this->FIRST) - intval($this->lessFIRST));
    $this->SIXTHResult = max(0, intval($this->SECOND) - intval($this->lessSECOND));
    $this->SEVENResult = max(0, intval($this->THIRD) - intval($this->lessTHIRD));
    $this->EIGHTResult = max(0, intval($this->FOURTH) - intval($this->lessFOURTH));


    $files = newcateg::find($this->id);
    $files->update([
       
        'FIRSTREM'=> $this->FIRSTResult,        
        'SECONDREM'=> $this->SECONDResult,
        'THIRDREM'=> $this->THIRDResult,
        'FOURTHREM'=> $this->FOURTHResult,
        'FIRST'=> $this->FIRSTResult,        
        'SECOND'=> $this->SECONDResult,
        'THIRD'=> $this->THIRDResult,
        'FOURTH'=> $this->FOURTHResult,
        'created_at'=> $this->created_at,
      
    ]);

    $this->updateMode = false;    
   
    session()->flash('message', 'Less Successfully.');
    $this->resetInputFields();
    $this->lessFIRST = "";
    $this->lessSECOND = "";
    $this->lessTHIRD = "";
    $this->lessFOURTH = "";
  
}
public function calculateTotalAug()
{
   // Calculate totals for each quarter
    $this->totalaug1 = intval($this->FIRSTaug) + intval($this->FIRST);
    $this->totalaug2 = intval($this->SECONDaug) + intval($this->SECOND);
    $this->totalaug3 = intval($this->THIRDaug) + intval($this->THIRD);
    $this->totalaug4 = intval($this->FOURTHaug) + intval($this->FOURTH);

    // Calculate totals including remaining balances
    $this->totalaug5 = intval($this->FIRSTaug) + intval($this->FIRSTREM);
    $this->totalaug6 = intval($this->SECONDaug) + intval($this->SECONDREM);
    $this->totalaug7 = intval($this->THIRDaug) + intval($this->THIRDREM);
    $this->totalaug8 = intval($this->FOURTHaug) + intval($this->FOURTHREM);

    // Update additional fields if necessary
    $this->updateaddaug();

    // Reset input fields
    $this->resetInputFields();

    // Clear the input fields
    $this->FIRSTaug = "";
    $this->SECONDaug = "";
    $this->THIRDaug = "";
    $this->FOURTHaug = "";

    // Redirect to a specific route with the new id
    // return redirect()->route('view', $this->addnew->id);   
}
public function updateaddaug()
{
    $validatedData = $this->validate([
       

        'FIRST'=> '',
        'SECOND'=> '',
        'THIRD'=> '',
        'FOURTH'=> '',
        'FIRSTREM'=> '',
        'SECONDREM'=> '',
        'THIRDREM'=> '',
        'FOURTHREM'=> '',
    ]);


    $files = newcateg::find($this->id);
    $files->update([
       

        'FIRST'=> $this->totalaug1,
        'SECOND'=> $this->totalaug2,
        'THIRD'=> $this->totalaug3,
        'FOURTH'=> $this->totalaug4,
        'FIRSTREM'=> $this->totalaug5,
        'SECONDREM'=> $this->totalaug6,
        'THIRDREM'=> $this->totalaug7,
        'FOURTHREM'=> $this->totalaug8,
    ]);

    $this->updateMode = false;    

    session()->flash('message', 'Added Successfully.');
  
    
}
public function storedata2()
{
    $this->savehistory2();
    $this->calculateTotalAug();
}

public function storedata()
{
    $this->savehistory();
    $this->Less();
}

public function savehistory()
{
    $validatedData = $this->validate([
        'categoryid' => '',
        'FIRST' => '',
        'THIRD' => '',
        'SECOND' => '',
        'FOURTH' => '',
       

    ]);
    $add = histories::create([
       'categoryid'  => $this->id,
        'FIRST' =>$this->lessFIRST,
        'THIRD' =>$this->lessTHIRD,
        'SECOND' => $this->lessSECOND,
        'FOURTH' =>$this->lessFOURTH,
        'FIRSTREM' =>$this->FIRSTREM,
        'THIRDREM' =>$this->THIRDREM,
        'SECONDREM' => $this->SECONDREM,
        'FOURTHREM' =>$this->FOURTHREM,
        'PPA'=>$this->PPA,
        'AIPRefCode'=>$this->AIPRefCode,
        'process' =>"Augmentation less budget for the ",
         'name' => Auth::user()->name, 
       
    ]);
    
} 
public function savehistory2()
{
    $validatedData = $this->validate([
        'categoryid' => '',
        'FIRST' => '',
        'THIRD' => '',
        'SECOND' => '',
        'FOURTH' => '',
       

    ]);
    $add = histories::create([
       'categoryid'  => $this->id,
        'FIRST' =>$this->FIRSTaug,
        'THIRD' =>$this->THIRDaug,
        'SECOND' => $this->SECONDaug,
        'FOURTH' =>$this->FOURTHaug,
        'FIRSTREM' =>$this->FIRSTREM,
        'THIRDREM' =>$this->THIRDREM,
        'SECONDREM' => $this->SECONDREM,
        'FOURTHREM' =>$this->FOURTHREM,
        'PPA'=>$this->PPA,
        'AIPRefCode'=>$this->AIPRefCode,
        'process' => "Augmentation added budget for the ",
         'name' => Auth::user()->name, 
       
    ]);
    
} 
 
public function Lesssupp()
{
    // Validation for input fields
    $validatedData = $this->validate([
        'lessupp1' => 'nullable|numeric|min:0',
        'lessupp2' => 'nullable|numeric|min:0',
        'lessupp3' => 'nullable|numeric|min:0',
        'lessupp4' => 'nullable|numeric|min:0',
    ]);

    // Additional checks for values
    if ($this->lessupp1 > $this->FIRST1) {
        session()->flash('error', 'Amount cannot be more than the Supplemental amount.');
        return;
    } elseif ($this->lessupp2 > $this->SECOND2) {
        session()->flash('message', 'Amount cannot be more than the Second Quarter.');
        return;
    } elseif ($this->lessupp3 > $this->THIRD3) {
        session()->flash('message', 'Amount cannot be more than the Third Quarter.');
        return;
    } elseif ($this->lessupp4 > $this->FOURTH4) {
        session()->flash('message', 'Amount cannot be more than the Fourth Quarter.');
        return;
    }

    // Calculating remaining amounts after deduction
    $this->supp1Result = max(0, intval($this->FIRST1) - intval($this->lessupp1));
    $this->supp2Result = max(0, intval($this->SECOND2) - intval($this->lessupp2));
    $this->supp3Result = max(0, intval($this->THIRD3) - intval($this->lessupp3));
    $this->supp4Result = max(0, intval($this->FOURTH4) - intval($this->lessupp4));

    // Update supplemental data in the database
    $supp = supplemental::find($this->id);
    $supp->update([
        'FIRST1'=> $this->supp1Result,
        'SECOND2'=> $this->supp2Result,
        'THIRD3'=> $this->supp3Result,
        'FOURTH4'=> $this->supp4Result,
    ]);

    $this->updateMode = false;
    $this->resetInputFields();
    session()->flash('message', 'Less Successfully.');
    $this->resetInputFields();
    $this->lessupp1 = "";
    $this->lessupp2 = "";
    $this->lessupp3 = "";
    $this->lessupp4 = "";
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

//     public function supphistory()
// {
//     $validatedData = $this->validate([
//         'categoryid' => '',
//         'FIRST' => '',
//         'THIRD' => '',
//         'SECOND' => '',
//         'FOURTH' => '',
       

//     ]);
//     $add = histories::find($this->id);
//     $add->update([
//        'categoryid'  => $this->id,
//         'FIRST' =>$this->lessupp1,
//         'THIRD' =>$this->lessupp3,
//         'SECOND' => $this->lessupp2,
//         'FOURTH' =>$this->lessupp4,
//         'FIRSTREM' =>$this->FIRSTREM,
//         'THIRDREM' =>$this->THIRDREM,
//         'SECONDREM' => $this->SECONDREM,
//         'FOURTHREM' =>$this->FOURTHREM,
//         'PPA'=>$this->PPA,
//         'AIPRefCode'=>$this->AIPRefCode,
//         'process' =>  "Augmentation less budget for the supplemental " ,
//         'name' => Auth::user()->name, 
       
//     ]);
//     $this->updateMode = false;
 
// } 
public function savehistory3()
{
    $validatedData = $this->validate([
        'categoryid' => '',
        'FIRST' => '',
        'THIRD' => '',
        'SECOND' => '',
        'FOURTH' => '',
       

    ]);
    $add = histories::create([
      'categoryid'  => $this->id,
        'FIRST' =>$this->lessupp1,
        'THIRD' =>$this->lessupp3,
        'SECOND' => $this->lessupp2,
        'FOURTH' =>$this->lessupp4,
        'FIRSTREM' =>$this->FIRSTREM,
        'THIRDREM' =>$this->THIRDREM,
        'SECONDREM' => $this->SECONDREM,
        'FOURTHREM' =>$this->FOURTHREM,
        'PPA'=>$this->PPA,
        'AIPRefCode'=>$this->AIPRefCode,
        'process' =>  "Augmentation less budget for the supplemental " ,
        'name' => Auth::user()->name, 
       
       
    ]);
    
} 
public function storedata3()
{
   $this->savehistory3();
    // $this->supphistory();
    $this->Lesssupp();
}
public function cancel1()
    {
        return redirect()->route('augmentation');   
    }
   
}
