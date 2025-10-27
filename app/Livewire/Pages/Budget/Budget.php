<?php

namespace App\Livewire\Pages\Budget;
use App\Models\addnew;
use App\Models\newcateg;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Budget extends Component
{
    use WithPagination;
    public  $Title, $Department, $Year,$AIPRefCode,$id;
    public $updateMode = false;
    public $addnew;
    public $query;
    public $designation;
    public $email;
    public $password;
    public $view;
    public $searchResults;
    public $newcateg;
    public $ACCOUNT_CODE;
    public $amount;
    protected $listeners = ['noResultsFound'];
 
   
    public function render()
    {
      
        $query = addnew::query();

        return view('livewire.pages.budget.budget', [
            'files' => addnew::where('AIPRefCode', 'like', '%' . $this->query . '%')
            ->orWhere('Title', 'like', '%' . $this->query . '%')
            ->orWhere('Department', 'like', '%' . $this->query . '%')
            ->orWhere('Year', 'like', '%' . $this->query . '%')
            ->orWhere('ACCOUNT_CODE', 'like', '%' . $this->query . '%')
            ->orderby('created_at', 'desc')->get(),
        ]);
    }

    private function resetInputFields(){
        $this->Title = '';
        $this->Department = '';
        $this->Year = '';
        $this->AIPRefCode = '';
        $this->ACCOUNT_CODE = '';
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedData = $this->validate([
            'Title' => 'required',
            'Department' => 'required',
            'Year' => 'required',
            'AIPRefCode' => 'required',
            'ACCOUNT_CODE' => 'required',
           
        ]);
        $files = addnew::create([
            'Title' => $this->Title,
            'Department' =>$this->Department,
            'Year' =>$this->Year,
            'AIPRefCode' => $this->AIPRefCode,
            'ACCOUNT_CODE' => $this->ACCOUNT_CODE
        ]);
  
        session()->flash('message','Added Successfully.');
  
        $this->resetInputFields();
        $this->dispatch('created'); 
    }  
    
    public function setdesignation($designation)
    {
        $this->designation = $designation;
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $file = addnew::findOrFail($id);
        $this->id = $id;
        $this->Title= $file->Title;
        $this->Department = $file->Department;
        $this->Year= $file->Year;
        $this->AIPRefCode= $file->AIPRefCode;
        $this->ACCOUNT_CODE= $file->ACCOUNT_CODE;
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
            'Title' => 'required',
            'Department' => 'required',
            'Year' => 'required',
            'AIPRefCode' => 'required',
            'ACCOUNT_CODE' => 'required',
            

        ]);
  
        $files = addnew::find($this->id);
        $files->update([
            'Title' => $this->Title,
            'Department' => $this->Department,
            'Year' => $this->Year,
            'AIPRefCode' => $this->AIPRefCode,
            'ACCOUNT_CODE' => $this->ACCOUNT_CODE,

            
          
        ]);
  
        $this->updateMode = false;    
  
        session()->flash('message','Updated Successfully.');
        $this->resetInputFields();
        
    }


    
    public function delete($id)
    {
      
        addnew::find($id)->delete();
        session()->flash('message','Deleted Successfully.');

    }
    public function edit_view($id)
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
  
    public function storenew()
    {
        $validatedData = $this->validate([
            'designation' => 'required',
            'email' => 'required',
            'password' => 'required',
           
           
        ]);

        User::create($validatedData);
  
        session()->flash('message','Created Successfully.');
  
        $this->resetInputFields();
    }
    // public function logoutHandler() {
    //     // dd('logout');
    //     Auth::guard('web')->logout();
    //     session()->flush();
    //     return redirect()->route('login')->with('success','Log Out Successfully!');
    //     // return redirect()->to('/logout');
    //     // return redirect()->route('login')->with('success','Log Out Successfully!');
        
    // } 
    public function logoutHandler() {
  
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('login')->with('success','Log Out Successfully!');
  
    }
    
}
