<?php

namespace App\Livewire\Pages\Budget;
use App\Models\newcateg;
use App\Models\detailsdeduction;
use App\Models\addingdetail;
use Livewire\Component;
use App\Models\supplemental;
use App\Models\histories;
use Illuminate\Support\Facades\Auth;
class Viewactivity extends Component
{
    public $id,$idid;
    public $newrem,$NOTE;
    public $deductionId;
    public $deduction;
    public $newcateg;
    public $CATEGORY, $Year;
    public $AIPRefCode;
    public $PPA;
    public $RESOURCES;
    public $RESPONSIBLE_UNIT;
    public $ACCOUNT_CODE;
    public $OBJECT_EXPENDITURE;
    public $SOURCE_FUND;
    public $SECOND,$SECONDREM;
    public $THIRD,$THIRDREM;
    public $FOURTH,$FOURTHREM;
    public $Quarter;
    public $PR_No;
    public $Date;
    public $Title;
    public $Status;
    public $total1, $total2, $total3, $total4, $totalapp;
    public $detailsdeduction;
    public $Amount = 0;
    public $Amountc;
    public $FIRST,$FIRSTREM;
    public $Totaldeduction = 0;
    public $uniqueID;
    public $updateMode = true;
    public $query;
    public $Statuss;
    public $category_id , $name, $amount;
    protected $listeners = ['noResultsFound'];
    public $isSaveDisabled = false;
    public $showMessage = false; 
    public $firstChecked = false;
    public $secondChecked = false;   
    public $thirdChecked = false;         
  
    
    public $isDisabled = false;
     public $showSaveButton = true;
     public $errorMessage = null;
    // public function render()
    // {
    //  
    //     return view('livewire.pages.budget.viewactivity');
    // }
 
    public function render()
    {
       

        $query = detailsdeduction::query(); // Use query() instead of all()
    
        if ($this->query) {
            $query->where(function ($q) {
                $q->where('Quarter', 'like', '%' . $this->query . '%')
                    ->orWhere('PR_No', 'like', '%' . $this->query . '%');
                    
            });
        }
      
        // $this->view = $query->get(); // Remove unnecessary get() here
        $this->deduction = $query->orderBy('created_at', 'desc')->get();
    
        return view('livewire.pages.budget.viewactivity');
    }
    
  
  
    public function search()
    {
        {
            $this->deduction = detailsdeduction::where('Quarter', 'like', '%' . $this->query . '%')
                ->orWhere('PR_No', 'like', '%' . $this->query . '%')
                ->orWhere('Date', 'like', '%' . $this->query . '%')
                ->orWhere('Title', 'like', '%' . $this->query . '%')

                ->get();
    
            // Check if no results were found
            if ($this->deduction->isEmpty()) {
                // You can add a message or perform other actions here
                // For example, you can set a flag to display a message in the Blade view
                // $this->emit('noResultsFound');
            }
        } 
        $this->render();
    } 


    public function mount($id)
    {

        $this->newcateg = Newcateg::find($id);
       

        if ($this->newcateg) {
            $this->CATEGORY = $this->newcateg->CATEGORY;
            $this->AIPRefCode = $this->newcateg->AIPRefCode;
            $this->PPA = $this->newcateg->PPA;
            $this->RESOURCES = $this->newcateg->RESOURCES;
            $this->RESPONSIBLE_UNIT = $this->newcateg->RESPONSIBLE_UNIT;
            $this->ACCOUNT_CODE = $this->newcateg->ACCOUNT_CODE;
            $this->OBJECT_EXPENDITURE = $this->newcateg->OBJECT_EXPENDITURE;
            $this->Year = $this->newcateg->Year;
            $this->SOURCE_FUND = $this->newcateg->SOURCE_FUND;
            $this->FIRST = $this->newcateg->FIRST;
            $this->FIRSTREM = $this->newcateg->FIRSTREM;
            $this->SECOND = $this->newcateg->SECOND;
            $this->SECONDREM = $this->newcateg->SECONDREM;
            $this->THIRD = $this->newcateg->THIRD;
            $this->THIRDREM = $this->newcateg->THIRDREM;
            $this->FOURTH = $this->newcateg->FOURTH;
            $this->FOURTHREM = $this->newcateg->FOURTHREM;
        }
       
    }
  

    public function setQuarter($Quarter)
    {
        $this->Quarter = $Quarter;
    }
    private function resetInputFields(){
      
        $this->Quarter = '';
        $this->Date = '';
        $this->PR_No = '';
        $this->Title = '';
        $this->Amount = '';
        $this->Status = ''; 
        $this->Totaldeduction = ''; 
       
 
    }
    public function store1()
    {
        $validatedData = $this->validate([
          'uniqueID'  => '',
            'Quarter' => '',
            'Date' => 'required',
            'PR_No' => 'required',
            'Title' => 'required',
            'Amount' => '',
            'Status' => '',
            'Totaldeduction' => '',
           
        ]);
        $deduction = detailsdeduction::create([
            'uniqueID'  => $this->id,
            'Quarter' => 'First Quarter',
            'Date' =>$this->Date,
            'PR_No' =>$this->PR_No,
            'Title' => $this->Title,
            'Amount' => $this->Amount,
            'Status' => $this->Status,
            'Totaldeduction' => $this->Totaldeduction
        ]);
        // $this->savehistory();
        session()->flash('message', 'Added Successfully.');
        $this->updaterem1();
        $this->resetInputFields();
        $this->dispatch('created'); 
        return redirect()->route('viewactivity', $this->newcateg->id);
        
    }     

    public function store2()
    {
        $validatedData = $this->validate([
            'uniqueID'  => '',
            'Quarter' => '',
            'Date' => 'required',
            'PR_No' => 'required',
            'Title' => 'required',
            'Amount' => '',
            'Status' => '',
            'Totaldeduction' => '',
           
        ]);
        $deduction = detailsdeduction::create([
            'uniqueID'  => $this->id,
            'Quarter' => 'Second Quarter',
            'Date' =>$this->Date,
            'PR_No' =>$this->PR_No,
            'Title' => $this->Title,
            'Amount' => $this->Amount,
            'Status' => $this->Status,
            'Totaldeduction' => $this->Totaldeduction
        ]);
  
        session()->flash('message', 'Added Successfully.');
        $this->updaterem2();
        $this->resetInputFields();
        $this->dispatch('created'); 
        return redirect()->route('viewactivity', $this->newcateg->id);
    }    

    public function store3()
    {
        $validatedData = $this->validate([
            'uniqueID'  => '',
            'Quarter' => '',
            'Date' => 'required',
            'PR_No' => 'required',
            'Title' => 'required',
            'Amount' => '',
            'Status' => '',
            'Totaldeduction' => '',
           
        ]);
        $deduction = detailsdeduction::create([
            'uniqueID'  => $this->id,
            'Quarter' => 'Third Quarter',
            'Date' =>$this->Date,
            'PR_No' =>$this->PR_No,
            'Title' => $this->Title,
            'Amount' => $this->Amount,
            'Status' => $this->Status,
            'Totaldeduction' => $this->Totaldeduction
        ]);
  
        session()->flash('message', 'Added Successfully.');
        $this->updaterem3();
        $this->resetInputFields();
        $this->dispatch('created'); 
        return redirect()->route('viewactivity', $this->newcateg->id);
    }  
    
    public function store4()
    {
        $validatedData = $this->validate([
            'uniqueID'  => '',
            'Quarter' => '',
            'Date' => 'required',
            'PR_No' => 'required',
            'Title' => 'required',
            'Amount' => '',
            'Status' => '',
            'Totaldeduction' => '',
           
        ]);
        $deduction = detailsdeduction::create([
            'uniqueID'  => $this->id,
            'Quarter' => 'Fourth Quarter',
            'Date' =>$this->Date,
            'PR_No' =>$this->PR_No,
            'Title' => $this->Title,
            'Amount' => $this->Amount,
            'Status' => $this->Status,
            'Totaldeduction' => $this->Totaldeduction
        ]);
  
        session()->flash('message', 'Added Successfully.');
        $this->updaterem4();
        $this->resetInputFields();
        $this->dispatch('created'); 
        return redirect()->route('viewactivity', $this->newcateg->id);
    }    

    public function calculateTotal1()
    {
        // Ensure Amount defaults to 0 if not provided
        $amount = empty($this->Amount) ? 0 : $this->Amount;
    
        // Perform the calculation
        $this->Totaldeduction = $this->FIRSTREM - $amount;
    
        // Check if the Totaldeduction is negative
        if ($this->Totaldeduction < 0) {
            // Set an error message
            $this->errorMessage = 'Total Deduction cannot be negative.';
    
            // Hide the save button
            $this->showSaveButton = false;
        } else {
            // Clear the error message and show the save button if the total is not negative
            $this->errorMessage = null;
            $this->showSaveButton = true;
        }
    }
    public function calculateTotal2()
    {
        // Ensure Amount defaults to 0 if not provided
        $amount = empty($this->Amount) ? 0 : $this->Amount;

        // Perform the calculation
        $this->Totaldeduction = $this->SECONDREM - $amount;

        if ($this->Totaldeduction < 0) {
            // Set an error message
            $this->errorMessage = 'Total Deduction cannot be negative.';
    
            // Hide the save button
            $this->showSaveButton = false;
        } else {
            // Clear the error message and show the save button if the total is not negative
            $this->errorMessage = null;
            $this->showSaveButton = true;
        }
    }

    public function calculateTotal3()
    {
        // Ensure Amount defaults to 0 if not provided
        $amount = empty($this->Amount) ? 0 : $this->Amount;

        // Perform the calculation
        $this->Totaldeduction = $this->THIRDREM- $amount;

        if ($this->Totaldeduction < 0) {
            // Set an error message
            $this->errorMessage = 'Total Deduction cannot be negative.';
    
            // Hide the save button
            $this->showSaveButton = false;
        } else {
            // Clear the error message and show the save button if the total is not negative
            $this->errorMessage = null;
            $this->showSaveButton = true;
        }
    }

    public function calculateTotal4()
    {
        // Ensure Amount defaults to 0 if not provided
        $amount = empty($this->Amount) ? 0 : $this->Amount;

        // Perform the calculation
        $this->Totaldeduction = $this->FOURTHREM- $amount;

        if ($this->Totaldeduction < 0) {
            // Set an error message
            $this->errorMessage = 'Total Deduction cannot be negative.';
    
            // Hide the save button
            $this->showSaveButton = false;
        } else {
            // Clear the error message and show the save button if the total is not negative
            $this->errorMessage = null;
            $this->showSaveButton = true;
        }
    }


    public function updatedSelectedQuarter($value)
{
    $this->resetAmount();
}

public function updaterem1()
{
    $validatedData = $this->validate([
       
        'FIRSTREM'=> '',

    ]);


    $files = newcateg::find($this->id);
    $files->update([
       
        'FIRSTREM'=> $this->Totaldeduction,
    ]);

    $this->updateMode = false;    

    session()->flash('message', 'Added Successfully.');
}
public function updaterem2()
{
    $validatedData = $this->validate([
       
        'SECONDREM'=> '',

    ]);


    $files = newcateg::find($this->id);
    $files->update([
       
        'SECONDREM'=> $this->Totaldeduction,
    ]);

    $this->updateMode = false;    

    session()->flash('message', 'Added Successfully.');
}
public function updaterem3()
{
    $validatedData = $this->validate([
       
        'THIRDREM'=> '',

    ]);


    $files = newcateg::find($this->id);
    $files->update([
       
        'THIRDREM'=> $this->Totaldeduction,
    ]);

    $this->updateMode = false;    

    session()->flash('message', 'Added Successfully.');
}
public function updaterem4()
{
    $validatedData = $this->validate([
       
        'FOURTHREM'=> '',

    ]);


    $files = newcateg::find($this->id);
    $files->update([
       
        'FOURTHREM'=> $this->Totaldeduction,
    ]);

    $this->updateMode = false;    

    session()->flash('message', 'Added Successfully.');
}

public function edit($id)
{
    // dd(('jason'));
    $file = newcateg::findOrFail($id);
    $this->id = $id;
    $this->FIRSTREM= $file->FIRSTREM;
    $this->updateMode = true;  
}

public function calculate1()
{
    // Ensure Amount defaults to 0 if not provided
    $amount = empty($this->Amount) ? 0 : $this->Amount;

    // Perform the calculation
    $this->FIRSTREM = $this->FIRSTREM + $amount;

   
}
public function deletededuc($id)
{
    // Check if the ID is being passed correctly
    if (!$id) {
        session()->flash('error', 'No ID provided.');
        return;
    }

    // Attempt to find the record by ID
    $deduction = detailsdeduction::find($id);
    

    // If the record is found, delete it
    if ($deduction) {
        $deduction->delete();
        session()->flash('message', 'Deleted Successfully.');
    } else {
        // If no record is found, display an error message
        session()->flash('error', 'Record not found.');
    }
    return redirect()->route('viewactivity', $this->newcateg->id);

} 

public function calculate()
{
    // Set the quarter (not used in calculation in this snippet)
    $this->Quarter = 'Second Quarter';

    // Ensure Amount and FIRSTREM have default values
    $Amount = empty($this->Amount) ? 0 : $this->Amount;
    $SECONDREM = empty($this->SECONDREM) ? 0 : $this->SECONDREM;

    // Perform the calculation: add Amount to FIRSTREM
    $this->SECONDREM = $SECONDREM + $Amount;

    // Optionally, you can return or further process the result
    return $this->SECONDREM;
}
public function editcancel($id)
{
    $deduction = detailsdeduction::findOrFail($id);
    $this->deductionId = $deduction->id; 
    $this->Amountc = $deduction->Amount;
    $this->Quarter = $deduction->Quarter;
    $this->Status = 'CANCELLED';
    $this->PR_No = $deduction->PR_No;
    $this->updateMode = true;  
}

public function update1()
{
    // Validate form inputs
    $validatedData = $this->validate([
        // 'uniqueID' => '',
        'Quarter' => '',
        'PR_No' => '',
        'Title' => '',
        'Date' => 'required|date',
        'Amount' => 'required|numeric',
        'Status' => '',
    ]);

    // Find the record to update
    $deduction = detailsdeduction::find($this->id);

    // Check if the record exists
    if (!$deduction) {
        session()->flash('error', 'Record not found.');
        return; // Exit or handle the error appropriately.
    }

    // Update the record
    $deduction->update([
    //   'id' => $this -> id,
        // 'uniqueID' => $this -> uniqueID,
        'Quarter' => $this->Quarter,
        'PR_No' => $this->PR_No,
        'Title' => $this->Title,
        'Date' => $this->Date,
        'Amount' => $this->Amount,
        'Status' => $this->Status,
    ]);

    $this->updateMode = false;

    session()->flash('message', 'Updated !');
    return redirect()->route('viewactivity', $this->newcateg->id);
}


public function editdelete($id)
{
    $deduction = detailsdeduction::findOrFail($id);
    $this->id = $id; 
    $this->uniqueID= $deduction->uniqueID; 
    $this->Quarter = $deduction->Quarter;
    $this->PR_No = $deduction->PR_No;
    $this->Title = $deduction->Title;
    $this->Date = $deduction->Date;
    $this->Amount = $deduction->Amount;
    $this->Status =  $deduction->Status;
    $this->updateMode = true;
}
public function deletecancel($id)
{
    if (!$id) {
        session()->flash('error', 'No ID provided.');
        return;
    }
    $deduction = detailsdeduction::find($id);

    // If the record is found, delete it
    if ($deduction) {
        $deduction->delete();
        session()->flash('message', 'Deleted Successfully.');
    } else {
        // If no record is found, display an error message
        session()->flash('error', 'Record not found.');
    }
} 

public function calculateNewTotal()
{
    switch ($this->Quarter) {
        case 'First Quarter':
            $this->newrem = $this->Amountc + $this->FIRSTREM;
            break;
        case 'Second Quarter':
            $this->newrem = $this->Amountc + $this->SECONDREM;
            break;
        case 'Third Quarter':
            $this->newrem = $this->Amountc + $this->THIRDREM;
            break;
        case 'Fourth Quarter':
            $this->newrem = $this->Amountc + $this->FOURTHREM;
            break;
        default:
            $this->newrem = 'N/A'; // Default if no quarter is selected
            break;
    }
}

public function updatenewrem1()
{
    $validatedData = $this->validate([
        'FIRSTREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'FIRSTREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    $this->updatestatus();
    return redirect()->route('viewactivity', $this->newcateg->id);

}
public function updatenewrem2()
{
    $validatedData = $this->validate([
        'SECONDREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'SECONDREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    // $this->deletecancel($this->deductionId);
    $this->updatestatus();
    return redirect()->route('viewactivity', $this->newcateg->id);
}

public function updatenewrem3()
{
    $validatedData = $this->validate([
        'THIRDREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'THIRDREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    $this->updatestatus();
    // $this->deletecancel($this->deductionId);
    return redirect()->route('viewactivity', $this->newcateg->id);
}

public function updatenewrem4()
{
    $validatedData = $this->validate([
        'FOURTHREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'FOURTHREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    $this->updatestatus();
    // $this->deletecancel($this->deductionId);
    return redirect()->route('viewactivity', $this->newcateg->id);
}

    public function updatestatus()
 
    {
        $validatedData = $this->validate([
            'Status' => 'nullable',
        ]);
    
        $deduction = detailsdeduction::find($this->deductionId);
    
        if ($deduction) {
    
            $deduction->update([
              'Status'=> $this->Status ,
            ]);
            $this->showMessage = true;
            $this->isDisabled = true;
        }
    
        $this->updateMode = false;    
    
        session()->flash('message', 'Cancelled Successfully.');


    }

public function storedata()
{
    $this->savehistory();
    $this->save1();
  
}
public function cancel1()
    {
        return redirect()->route('viewactivity', $this->newcateg->id);
    }
    public function logoutHandler() {
  
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login')->with('success','Log Out Successfully!');
  
    }
      
    // public function RB1()
    // {
       
    
    //     // Calculate totals for each quarter
    //     $this->SECOND = intval($this->FIRSTREM) + intval($this->SECOND);
    //     $this->SECONDREM = intval($this->FIRSTREM) + intval($this->SECONDREM);

    //      // Clear the balance of FIRSTREM
    //      $this->FIRSTREM = 0;
    // }

   
// public function RB2()
// {
//     // Load the record you want to update, for example by ID
//     $record = newcateg::find($this->id);

//     if ($record) {
       

//         // Recalculate totals
//         $record->THIRD = floatval($record->SECONDREM) + floatval($record->THIRD);
//         $record->THIRDREM = floatval($record->SECONDREM) + floatval($record->THIRDREM);

//          // Clear the balance
//          $record->SECONDREM = 0;
//         // Save to database
//         $record->save();

//         // Optionally update local component state
//         $this->SECONDREM = $record->SECONDREM;
//         $this->THIRD = $record->THIRD;
//         $this->THIRDREM = $record->THIRDREM;
//     }
// }
// public function RB3()
// {
//     // Load the record you want to update, for example by ID
//     $record = newcateg::find($this->id);

//     if ($record) {
       

//         // Recalculate totals
//         $record->FOURTH = floatval($record->THIRDREM) + floatval($record->FOURTH);
//         $record->FOURTHREM = floatval($record->THIRDREM) + floatval($record->FOURTHREM);

//          // Clear the balance
//          $record->THIRDREM = 0;
//         // Save to database
//         $record->save();

//         // Optionally update local component state
//         $this->FOURTHREM = $record->FOURTHREM;
//         $this->FOURTH = $record->FOURTH;
//         $this->THIRDREM = $record->THIRDREM;
//     }
// }

public function delete($id)
{
    // $data = detailsdeduction::find($id);
    // dd($data->id);
    
    detailsdeduction::find($id)->delete();
    session()->flash('message','Deleted Successfully.');

}

public function editdelete1($id)
{
    $deduction = detailsdeduction::findOrFail($id);                                   
    $this->id = $deduction->id;
    $this->Amountc = $deduction->Amount;
    $this->Quarter = $deduction->Quarter;
    $this->Status =  $deduction->Status;
    $this->PR_No = $deduction->PR_No;
    $this->updateMode = true;  
}

public function deletenewrem1($id)
{
    $this->validate([
        'FIRSTREM' => 'nullable|numeric',
    ]);                   
    // Fetch the 'newcateg' record using the actual $id parameter
    $files = newcateg::find($id);

    if ($files) {
        $this->calculateNewTotal();

        // Update the 'FIRSTREM' field with the new total
        $files->update([
            'FIRSTREM' => $this->newrem,
        ]);
    }
    $this->updateMode = false;

    session()->flash('message', 'Cancelled Successfully.'); 

    $this->updatestatus();

    return redirect()->route('viewactivity', $id);
}
public function deletenewrem2()
{
    $validatedData = $this->validate([
        'SECONDREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'SECONDREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    // $this->deletecancel($this->deductionId);
    $this->updatestatus();
    return redirect()->route('viewactivity', $this->newcateg->id);
}

public function deletenewrem3()
{
    $validatedData = $this->validate([
        'THIRDREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'THIRDREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    $this->updatestatus();
    // $this->deletecancel($this->deductionId);
    return redirect()->route('viewactivity', $this->newcateg->id);
}

public function deletenewrem4()
{
    $validatedData = $this->validate([
        'FOURTHREM' => 'nullable|numeric',
    ]);

    $files = newcateg::find($this->id);

    if ($files) {
        // Ensure that $newrem is calculated before updating
        $this->calculateNewTotal();

        // Update the FIRSTREM field with the value of $newrem
        $files->update([
            'FOURTHREM' => $this->newrem,
        ]);
    }

    $this->updateMode = false;    

    session()->flash('message', 'Cancelled Successfully.');
    $this->updatestatus();
    // $this->deletecancel($this->deductionId);
    return redirect()->route('viewactivity', $this->newcateg->id);
}
  public function editquarter($id)
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
         
      
        $this->FIRSTREM= $file->FIRSTREM;
        $this->SECONDREM= $file->SECONDREM;
        $this->THIRDREM= $file->THIRDREM;
        $this->FOURTHREM= $file->FOURTHREM;
        $this->NOTE= $file->NOTE;
 
        
        $this->updateMode = true;  
    }
     public function RB1()
    {
        // Load the record you want to update, for example by ID
        $record = newcateg::find($this->id);
    
        if ($record) {
            // Recalculate totals using float for decimal support
            $record->SECOND = floatval($record->FIRSTREM) + floatval($record->SECOND);
            $record->SECONDREM = floatval($record->FIRSTREM) + floatval($record->SECONDREM);
    
            // Clear the balance
            $record->FIRSTREM = 0;
    
            // Save to database
            $record->save();
    
            // Optionally update local component state
            $this->FIRSTREM = $record->FIRSTREM;
            $this->SECOND = $record->SECOND;
            $this->SECONDREM = $record->SECONDREM;
        }
        return redirect()->route('viewactivity', $this->newcateg->id);
    }

public function RB2()
{
    $record = newcateg::find($this->id);

    if ($record) {
        $totalToAdd = 0;

        if ($this->firstChecked) {
            $totalToAdd += floatval($record->FIRSTREM);
            $record->FIRSTREM = 0;
            $this->FIRSTREM = 0; // Also clear the component state
        }

        if ($this->secondChecked) {
            $totalToAdd += floatval($record->SECONDREM);
            $record->SECONDREM = 0;
            $this->SECONDREM = 0; // Also clear the component state
        }

        $record->THIRD += $totalToAdd;
        $record->THIRDREM += $totalToAdd;

        $record->save();

        // Update component state
        $this->THIRD = $record->THIRD;
        $this->THIRDREM = $record->THIRDREM;
    }
     return redirect()->route('viewactivity', $this->newcateg->id);
}
public function RB3()
{
    $record = newcateg::find($this->id);

    if ($record) {
        $totalToAdd = 0;

        // Add First Quarter Remaining if checked
        if ($this->firstChecked) {
            $totalToAdd += floatval($record->FIRSTREM);
            $record->FIRSTREM = 0;
            $this->FIRSTREM = 0;
        }

        // Add Second Quarter Remaining if checked
        if ($this->secondChecked) {
            $totalToAdd += floatval($record->SECONDREM);
            $record->SECONDREM = 0;
            $this->SECONDREM = 0;
        }

        // Add Third Quarter Remaining if checked
        if ($this->thirdChecked) {
            $totalToAdd += floatval($record->THIRDREM);
            $record->THIRDREM = 0;
            $this->THIRDREM = 0;
        }

        // Add total to Fourth Quarter
        $record->FOURTH += $totalToAdd;
        $record->FOURTHREM += $totalToAdd;

        $record->save();

        // Sync component state with updated model
        $this->FOURTH = $record->FOURTH;
        $this->FOURTHREM = $record->FOURTHREM;

        // Optional: Uncheck all checkboxes after operation
        // $this->firstChecked = false;
        // $this->secondChecked = false;
        // $this->thirdChecked = false;
    }
     return redirect()->route('viewactivity', $this->newcateg->id);
}
}
