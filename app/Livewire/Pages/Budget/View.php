<?php

namespace App\Livewire\Pages\Budget;
use App\Models\newcateg;
use App\Models\addnew;
use App\Models\addingdetails;
use App\Models\supplemental;
use App\Models\histories;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $view, $CATEGORY, $PPA,$RESOURCES,$RESPONSIBLE_UNIT,$ACCOUNT_CODE,$OBJECT_EXPENDITURE,$SOURCE_FUND,$id;
    public $FIRST = ''; 
    public $SECOND = '';
    public $THIRD = '';
    public $FOURTH = '';
    public $FIRSTREM = ''; 
    public $SECONDREM = '';
    public $THIRDREM = '';
    public $FOURTHREM = '';
    public $TOTAL= '';
    public $NOTE = '';
    public$REMAINING_BALANCE= '';
    public$FIRSTResult= '';
    public$SECONDResult= '';
    public$THIRDResult= '';
    public$FOURTHResult= '';
    public$lessFIRST= '';
    public$lessSECOND= '';
    public$lessTHIRD= '';
    public$lessFOURTH= '';
    public $supplementless;
    public $supplementResult;
    public $supplementalless;
    public $supid;
    public $SUPPLEMENT;
    public $maxColspan;
    public $supplementals;
    public $process;
    public $categoryid;

    public $ebudget;

    public$Title;
    public$Department;

    public $Year;
    public $AIPRefCode;

public $created_at;
    public $addnew;
    public $files;
    public  $FIFTHResult,$SIXTHResult,$SEVENResult,$EIGHTResult;
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
        $this->add = addingdetails::where('uniqueID', $this->id)->orderBy('created_at', 'desc')->get();
        $this->view = newcateg::where('AIPRefCode', $this->AIPRefCode)->orderBy('created_at', 'desc')->get();
        // dd($this->view);
        return view('livewire.pages.budget.view', [
    
            'view' => $this->view,
        ]);
    }

    protected $listeners = ['fileDisplayed' => 'loadFileData'];
    public function loadFileData($id, $Title, $Department, $Year, $AIPRefCode)
    {
        $this->id = $id;
        $this->Title = $Title;
        $this->Department = $Department;
        $this->Year = $Year;
        $this->AIPRefCode = $AIPRefCode;
    }
    public function setCategory($CATEGORY)
    {
        $this->CATEGORY = $CATEGORY;
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
    public function store()
    {
        
        $validatedData = $this->validate([
            'CATEGORY' => 'required',
            'AIPRefCode' => 'required',
            'PPA' => 'required',
            'RESOURCES' => 'required',
            'RESPONSIBLE_UNIT' => 'required',
            'ACCOUNT_CODE' => 'required',
            'OBJECT_EXPENDITURE' => 'required',
            'SOURCE_FUND' => 'required',
            'Year' => 'required',
            'FIRST' => 'nullable',
            'SECOND' => 'nullable',
            'THIRD' => 'nullable',
            'FOURTH' => 'nullable',
            'FIRSTREM' => 'nullable',
            'SECONDREM' => 'nullable',
            'THIRDREM' => 'nullable',
            'FOURTHREM' => 'nullable',
            'NOTE' => 'nullable',
            
        ], [
            'CATEGORY' => 'Category is required',
            'PPA' => 'PPA is required',
            'RESOURCES' => 'Resources is required',
            'RESPONSIBLE_UNIT' => 'Responsible Unit is required',
            'ACCOUNT_CODE' => 'Account code is required',
            'OBJECT_EXPENDITURE' => 'Object Expenditure is required',
            'SOURCE_FUND' => 'Source of Fund is required',
             'Year' => 'YEAR is required',
        ]);
    
        // Convert empty strings to null
        foreach (['FIRST', 'SECOND', 'THIRD', 'FOURTH', 'FIRSTREM', 'SECONDREM', 'THIRDREM', 'FOURTHREM'] as $field) {
            if (isset($validatedData[$field]) && $validatedData[$field] === '') {
                $validatedData[$field] = null;
            }
      
        }
    
        // Set default values for non-required fields if they are empty
        $validatedData['FIRST'] = $validatedData['FIRST'] ?? 0;
        $validatedData['SECOND'] = $validatedData['SECOND'] ?? 0;
        $validatedData['THIRD'] = $validatedData['THIRD'] ?? 0;
        $validatedData['FOURTH'] = $validatedData['FOURTH'] ?? 0;
        $validatedData['FIRSTREM'] = $validatedData['FIRST'] ?? 0;
        $validatedData['SECONDREM'] = $validatedData['SECOND'] ?? 0;
        $validatedData['THIRDREM'] = $validatedData['THIRD'] ?? 0;
        $validatedData['FOURTHREM'] = $validatedData['FOURTH'] ?? 0;
     
        newcateg::create($validatedData);
        session()->flash('message', 'Added Successfully.');
        $this->resetInputFields();
        return redirect()->route('view', $this->addnew->id);
    }          

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        $this->Year= $file->Year;
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

  
   
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    
    public function update()
    {
        $validatedData = $this->validate([
           
            'CATEGORY'=> 'required',
            'AIPRefCode'=> 'required',
            'PPA'=> 'required',
            'RESOURCES'=> 'required',
            'RESPONSIBLE_UNIT'=> 'required',
            'ACCOUNT_CODE'=> 'required',
            'OBJECT_EXPENDITURE'=> 'required',
            'Year'=> 'required',
            'SOURCE_FUND'=> 'required',
            'FIRST'=> '',
            'SECOND'=> '',
            'THIRD'=> '',
            'FOURTH'=> '',
            'FIRSTREM'=> '',
            'SECONDREM'=> '',
            'THIRDREM'=> '',
            'FOURTHREM'=> '',
            'NOTE'=> '',
        ]);

  
        $files = newcateg::find($this->id);
        $files->update([
           
           
            'CATEGORY'=>$this->CATEGORY,
            'AIPRefCode'=>$this->AIPRefCode,
            'PPA'=>$this->PPA,
            'RESOURCES'=> $this->RESOURCES,
            'RESPONSIBLE_UNIT'=> $this->RESPONSIBLE_UNIT,
            'ACCOUNT_CODE'=> $this->ACCOUNT_CODE,
            'OBJECT_EXPENDITURE'=> $this->OBJECT_EXPENDITURE,
            'Year'=> $this->Year,
            'SOURCE_FUND'=> $this->SOURCE_FUND,
            'FIRST'=> $this->FIRST,
            'SECOND'=> $this->SECOND,
            'THIRD'=> $this->THIRD,
            'FOURTH'=> $this->FOURTH, 
            'FIRSTREM'=> $this->FIRSTREM,
           'SECONDREM'=> $this->SECONDREM,
           'THIRDREM'=> $this->THIRDREM,
            'FOURTHREM'=> $this->FOURTHREM,
            'NOTE'=> $this->NOTE,
        ]);

        $this->updateMode = false;    
  
        session()->flash('message', 'Update Successfully.');
        $this->resetInputFields();
        return redirect()->route('view', $this->addnew->id);  
    }
   
 
    public function delete($id)
    {
        newcateg::find($id)->delete();
        session()->flash('message', 'Deleted Successfully.');

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

    // $this->FIFTHResult = max(0, intval($this->FIRST) - intval($this->lessFIRST));
    // $this->SIXTHResult = max(0, intval($this->SECOND) - intval($this->lessSECOND));
    // $this->SEVENResult = max(0, intval($this->THIRD) - intval($this->lessTHIRD));
    // $this->EIGHTResult = max(0, intval($this->FOURTH) - intval($this->lessFOURTH));


    $files = newcateg::find($this->id);
    $files->update([
       
        'FIRSTREM'=> $this->FIRSTResult,        
        'SECONDREM'=> $this->SECONDResult,
        'THIRDREM'=> $this->THIRDResult,
        'FOURTHREM'=> $this->FOURTHResult,
        // 'FIRST'=> $this->FIRSTResult,        
        // 'SECOND'=> $this->SECONDResult,
        // 'THIRD'=> $this->THIRDResult,
        // 'FOURTH'=> $this->FOURTHResult,
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

    public function mount($id)
    {
       
        $this->addnew = addnew::find($id);

        if ($this->addnew) {  
            $this->Title = $this->addnew->Title;
            $this->Department = $this->addnew->Department;
            $this->Year = $this->addnew->Year;
            $this->AIPRefCode = $this->addnew->AIPRefCode;
            $this->ACCOUNT_CODE = $this->addnew->ACCOUNT_CODE;
        }
      
    }
    public function newcateg()
    {
        // Retrieve the newcateg object based on the current id
        return newcateg::find($this->id);
    }
    
    public function addingdetails()
    {
        // Retrieve the addingdetails object based on the current id
        return addingdetails::find($this->id);
    }
    
    public function calculateTotal()
    {
       // Calculate totals for each quarter
        $this->total1 = intval($this->FIRSTadd) + intval($this->FIRST);
        $this->total2 = intval($this->SECONDadd) + intval($this->SECOND);
        $this->total3 = intval($this->THIRDadd) + intval($this->THIRD);
        $this->total4 = intval($this->FOURTHadd) + intval($this->FOURTH);
    
        // Calculate totals including remaining balances
        $this->total5 = intval($this->FIRSTadd) + intval($this->FIRSTREM);
        $this->total6 = intval($this->SECONDadd) + intval($this->SECONDREM);
        $this->total7 = intval($this->THIRDadd) + intval($this->THIRDREM);
        $this->total8 = intval($this->FOURTHadd) + intval($this->FOURTHREM);
    
        // Update additional fields if necessary
        $this->updateadd();
    
        // Reset input fields
        $this->resetInputFields();
    
        // Clear the input fields
        $this->FIRSTadd = "";
        $this->SECONDadd = "";
        $this->THIRDadd = "";
        $this->FOURTHadd = "";
    
        // Redirect to a specific route with the new id
        return redirect()->route('view', $this->addnew->id);   
    }

    public function updateadd()
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

            'FIRST'=> $this->total1,
            'SECOND'=> $this->total2,
            'THIRD'=> $this->total3,
            'FOURTH'=> $this->total4,
            'FIRSTREM'=> $this->total5,
            'SECONDREM'=> $this->total6,
            'THIRDREM'=> $this->total7,
            'FOURTHREM'=> $this->total8,
        ]);
  
        $this->updateMode = false;    
  
        session()->flash('message', 'Added Successfully.');
        $this->resetInputFields();
        return redirect()->route('view', $this->addnew->id);  
        
    }

    public function edit_view($id)
    {
        $this->newcateg = newcateg::find($id);

        if ($this->newcateg) {
            $this-> CATEGORY= $this->newcateg->CATEGORY;
            $this->AIPRefCode = $this->newcateg->AIPRefCode;
            $this->PPA = $this->newcateg->PPA;
            $this->RESOURCES = $this->newcateg->RESOURCES;
            $this->RESPONSIBLE_UNIT = $this->newcateg->RESPONSIBLE_UNIT;
            $this->ACCOUNT_CODE = $this->newcateg->ACCOUNT_CODE;
            $this->OBJECT_EXPENDITURE = $this->newcateg->OBJECT_EXPENDITURE;
            $this->SOURCE_FUND = $this->newcateg->SOURCE_FUND;
            $this->FIRST = $this->newcateg->FIRST;
            $this->SECOND = $this->newcateg->SECOND;
            $this->THIRD = $this->newcateg->THIRD;
            $this->FOURTH = $this->newcateg->FOURTH;
            $this->NOTE = $this->newcateg->NOTE;
               $this->Year = $this->newcateg->Year;
        }

       
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

  
    public function editcategories($id,$PPA,$RESOURCES,$RESPONSIBLE_UNIT,$OBJECT_EXPENDITURE,$SOURCE_FUND,$NOTE)
    {
        $file = newcateg::findOrFail($id);
        $this->id = $id;
        $this->AIPRefCode = $file->AIPRefCode;
        $this->PPA= $file->PPA;
        $this->RESOURCES= $file->RESOURCES;
        $this->RESPONSIBLE_UNIT= $file->RESPONSIBLE_UNIT;
        $this->ACCOUNT_CODE = $file->ACCOUNT_CODE;
        $this->OBJECT_EXPENDITURE= $file->OBJECT_EXPENDITURE;
        $this->SOURCE_FUND= $file->SOURCE_FUND;
        $this->NOTE= $file->NOTE;  
        $this->updateMode = true;  
    }

    public function updatecategorie()
    {
        $validatedData = $this->validate([
           
            
            'AIPRefCode'=> 'required',
            'PPA'=> 'required',
            'RESOURCES'=> 'required',
            'RESPONSIBLE_UNIT'=> 'required',
            'ACCOUNT_CODE'=> 'required',
            'OBJECT_EXPENDITURE'=> 'required',
            'SOURCE_FUND'=> 'required',
            'NOTE'=> '',
        ]);

  
        $files = newcateg::find($this->id);
        $files->update([
           
   
            'AIPRefCode'=>$this->AIPRefCode,
            'PPA'=>$this->PPA,
            'RESOURCES'=> $this->RESOURCES,
            'RESPONSIBLE_UNIT'=> $this->RESPONSIBLE_UNIT,
            'ACCOUNT_CODE'=> $this->ACCOUNT_CODE,
            'OBJECT_EXPENDITURE'=> $this->OBJECT_EXPENDITURE,
            'SOURCE_FUND'=> $this->SOURCE_FUND,
            'NOTE'=> $this->NOTE,
          'FIRST'=>$this->FIRST,
          'SECOND'=>$this->SECOND,
          'THIRD'=>$this->THIRD,
          'FOURTH'=>$this->FOURTH,
          'FIRSTREM'=>$this->FIRST,
          'SECONDREM'=>$this->SECOND,
          'THIRDREM'=>$this->THIRD,
          'FOURTHREM'=>$this->FOURTH,
        ]);

        $this->updateMode = false;    
  
        session()->flash('message', 'Updated!');
        $this->resetInputFields();
        // return redirect()->route('view', $this->addnew->id);  
    }

    public function save()
    {
        $validatedData = $this->validate([
            'uniqueID' => '',
            'FIRSTadd' => '',
            'THIRDadd' => '',
            'SECONDadd' => '',
            'FOURTHadd' => '',
            'Date' => '',
            'created_at' => '',
          
           
        ]);
        $add = addingdetails::create([
           'uniqueID'  => $this->id,
            'FIRSTadd' =>$this->FIRSTadd,
            'THIRDadd' =>$this->THIRDadd,
            'SECONDadd' => $this->SECONDadd,
            'FOURTHadd' =>$this->FOURTHadd,
            'Date' => $this->Date,
             'created_at'=> $this->created_at,
            //  'name' => Auth::user()->name, 
           
        ]);
        
        session()->flash('message', 'Added Successfully.');
        $this->calculateTotal();
       
        $this->resetInputFields();
        // $this->dispatch('created'); 
        return redirect()->route('view', $this->addnew->id);  
    } 
    

    public function Lesssupp()
    {
        $validatedData = $this->validate([

            'less1' => 'nullable|numeric|min:0',
          

        ]);
        if ($this->less1 > $this->amount) {
            session()->flash('error', 'Amount cannot be more than the Supplemental amount.');
            return;
        }
       

        $this->TotalResult = max(0, intval($this->amount) - intval($this->less1));
       
 

        $supp = supplemental::find($this->id);
        $supp->update([
           
            'amount'=> $this->TotalResult,        
          
          
        ]);

        $this->updateMode = false;    
        $this->resetInputFields();
        $this->resetInputFields();
      
        return redirect()->route('view', $this->addnew->id);
    }

    public function cancel1()
    {
        return redirect()->route('view', $this->addnew->id);   
    }
     
    public function editsupp($id)
    {
        $supp = supplemental::findOrFail($id);
        $this->id =  $supp->id;
        $this->category_id = $supp->category_id; 
        $this->name = $supp->name;
        $this->amount = $supp->amount;
        $this->updateMode = true;  
    }
   
    public function storedata()
    {
        $this->savehistory();
        $this->save();
    }
    
    public function savehistory()
    {
        $validatedData = $this->validate([
            'categoryid' => '',
            'FIRSTadd' => '',
            'THIRDadd' => '',
            'SECONDadd' => '',
            'FOURTHadd' => '',
               
  
        ]);
        $add = histories::create([
           'categoryid'  => $this->id,
            'FIRST' =>$this->FIRSTadd,
            'THIRD' =>$this->THIRDadd,
            'SECOND' => $this->SECONDadd,
            'FOURTH' =>$this->FOURTHadd,
            'FIRSTREM' =>$this->FIRSTREM,
            'THIRDREM' =>$this->THIRDREM,
            'SECONDREM' => $this->SECONDREM,
            'FOURTHREM' =>$this->FOURTHREM,
            'PPA'=>$this->PPA,
            'AIPRefCode'=>$this->AIPRefCode,
            'process' => "Additional budget allocated for the",
            'name' => Auth::user()->name, 
           
        ]);

    } 
    public function logoutHandler() {
  
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login')->with('success','Log Out Successfully!');
  
    }
    public function storedata1()
{
    $this->savehistory1();
    $this->Less();
}

public function savehistory1()
{
    // Validate the incoming data
    $validatedData = $this->validate([
        'categoryid' => '',
        'FIRSTadd' => '',
        'THIRDadd' => '',
        'SECONDadd' => '',
        'FOURTHadd' => '',
    ]);

    // Assign default values if needed, or check for empty values
    $firstValue = is_numeric($this->lessFIRST) ? $this->lessFIRST : null; // Set null if not a valid number
    $thirdValue = is_numeric($this->lessTHIRD) ? $this->lessTHIRD : null;
    $secondValue = is_numeric($this->lessSECOND) ? $this->lessSECOND : null;
    $fourthValue = is_numeric($this->lessFOURTH) ? $this->lessFOURTH : null;

    // Save the history record
    $add = histories::create([
        'categoryid'  => $this->id,
        'FIRST'       => $firstValue,  // Use validated value
        'THIRD'       => $thirdValue,  // Use validated value
        'SECOND'      => $secondValue, // Use validated value
        'FOURTH'      => $fourthValue, // Use validated value
        'FIRSTREM'    => $this->FIRSTREM,
        'THIRDREM'    => $this->THIRDREM,
        'SECONDREM'   => $this->SECONDREM,
        'FOURTHREM'   => $this->FOURTHREM,
        'PPA'         => $this->PPA,
        'AIPRefCode'  => $this->AIPRefCode,
        'process'     => "Less budget allocated for the",
        'name'        => Auth::user()->name, 
    ]);
}
}
