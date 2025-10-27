<?php

namespace App\Livewire\Pages\Dashboard;
use App\Models\newcateg;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Dashboard extends Component
{
    use WithPagination;
  
    public $TOTAL_APPROPRIATION,$AIPRefCode, $PPA,$RESOURCES,$RESPONSIBLE_UNIT,$ACCOUNT_CODE,$OBJECT_EXPENDITURE,$SOURCE_FUND,$id;
    public $FIRST = ''; 
    public $SECOND = '';
    public $THIRD = '';
    public $FOURTH = '';
    public $TOTAL= '';
    public$REMAINING_BALANCE= '';
    public$FIRSTResult= '';
    public$SECONDResult= '';
    public$THIRDResult= '';
    public$FOURTHResult= '';
    public$lessFIRST= '';
    public$lessSECOND= '';
    public$lessTHIRD= '';
    public$lessFOURTH= '';
    public $query;
    public $view ;
    protected $listeners = ['noResultsFound'];
    public $designation;
    public $email,$name;
    public $password;
 
    

    public $updateMode = false;

    public function print()
    {
        return view('livewire.pages.dashboard.print');
    }
    
    public function setdesignation($designation)
    {
        $this->designation = $designation;
    }
    public function render()
    {
       
        $query = newcateg::query(); // Use query() instead of all()
    
        if ($this->query) {
            $query->where(function ($q) {
                $q->where('AIPRefCode', 'like', '%' . $this->query . '%')
                    ->orWhere('PPA', 'like', '%' . $this->query . '%');
                    
            });
        }
      
        // $this->view = $query->get(); // Remove unnecessary get() here
        $this->view = $query->orderBy('created_at', 'desc')->get();
    
        return view('livewire.pages.dashboard.dashboard');
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
        $this->TOTAL_APPROPRIATION = '';
        $this->AIPRefCode = '';
        $this->PPA = '';
        $this->RESOURCES = '';
        $this->RESPONSIBLE_UNIT = '';
        // $this->SUCCESS_INDICATOR = '';
        // $this->MEANS_VERIFICATION= '';
        $this->ACCOUNT_CODE = '';
        $this->OBJECT_EXPENDITURE = '';
        $this->SOURCE_FUND = '';
       
        $this->REMAINING_BALANCE = '';
       
    
 
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedData = $this->validate([   
         'TOTAL_APPROPRIATION'=> 'required',
         'AIPRefCode'=> 'required',
         'PPA'=> 'required',
         'RESOURCES'=> 'required',
         'RESPONSIBLE_UNIT'=> 'required',
         'ACCOUNT_CODE'=> 'required',
         'OBJECT_EXPENDITURE'=> 'required',
         'SOURCE_FUND'=> 'required',
         'REMAINING_BALANCE'=> '',
        ]);

        newcateg::create($validatedData);
        
  
        session()->flash('message', 'Created Successfully.');
  
        $this->resetInputFields();

    }     

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $file = newcateg::findOrFail($id);
        $this->id = $id;
        $this->TOTAL_APPROPRIATION= $file->TOTAL_APPROPRIATION;
        $this->AIPRefCode = $file->AIPrefCode;
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
      
 
        $this->updateMode = true;

        
    }

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedData = $this->validate([
           
            'TOTAL_APPROPRIATION'=> 'required',
            'AIPRefCode'=> 'required',
            'PPA'=> 'required',
            'RESOURCES'=> 'required',
            'RESPONSIBLE_UNIT'=> 'required',
            'ACCOUNT_CODE'=> 'required',
            'OBJECT_EXPENDITURE'=> 'required',
            'SOURCE_FUND'=> 'required',
            'FIRST'=> '',
            'SECOND'=> '',
            'THIRD'=> '',
            'FOURTH'=> '',
            'REMAINING_BALANCE'=> '',
        ]);

  
        $files = newcateg::find($this->id);
        $files->update([
           
            'TOTAL_APPROPRIATION'=> $this->TOTAL_APPROPRIATION,
            'AIPRefCode'=>$this->AIPRefCode,
            'PPA'=>$this->PPA,
            'RESOURCES'=> $this->RESOURCES,
            'RESPONSIBLE_UNIT'=> $this->RESPONSIBLE_UNIT,
            'ACCOUNT_CODE'=> $this->ACCOUNT_CODE,
            'OBJECT_EXPENDITURE'=> $this->OBJECT_EXPENDITURE,
            'SOURCE_FUND'=> $this->SOURCE_FUND,
            'FIRST'=> $this->FIRST,
            'SECOND'=> $this->SECOND,
            'THIRD'=> $this->THIRD,
            'FOURTH'=> $this->FOURTH,
            'REMAINING_BALANCE'=> $this->REMAINING_BALANCE,
           

            
          
        ]);
  

        $this->updateMode = false;        
  
        session()->flash('message', 'Updated Successfully.');
        $this->resetInputFields();
        
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        newcateg::find($id)->delete();
        session()->flash('message', 'Deleted Successfully.');

    }

    public function Less()
    {
        $validatedData = $this->validate([

            'FIRST'=> '',
            'SECOND'=> '',
            'THIRD'=> '',
            'FOURTH'=> '',

        ]);
        
        $this->FIRSTResult = $this->FIRST - $this->lessFIRST;
        $this->SECONDResult = $this->SECOND - $this->lessSECOND;
        $this->THIRDResult = $this->THIRD - $this->lessTHIRD;
        $this->FOURTHResult = $this->FOURTH - $this->lessFOURTH;

        $files = newcateg::find($this->id);
        $files->update([
           
            'FIRST'=> $this->FIRSTResult,
            'SECOND'=> $this->SECONDResult,
            'THIRD'=> $this->THIRDResult,
            'FOURTH'=> $this->FOURTHResult,
           
        ]);


        $this->updateMode = false;    
  
        session()->flash('message', 'Updated Successfully.');
        $this->resetInputFields();
        
    }
    public function logoutHandler() {
  
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login')->with('success','Log Out Successfully!');
  
    }
    public function storenew()
    {
        $validatedData = $this->validate([
            'designation' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',       
        ]);
        User::create($validatedData);
        session()->flash('message', 'Created Successfully.');
        $this->resetInputFields();
        $this->designation = "";
        $this->name = "";
        $this->email = "";
        $this->password = "";
       
    }

}
