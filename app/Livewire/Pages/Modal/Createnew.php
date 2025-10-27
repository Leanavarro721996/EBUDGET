<?php

namespace App\Livewire\Pages\Modal;

use Livewire\Component;
use App\Models\addnew;

class Createnew extends Component
{
    public $files, $Title, $Department, $Year,$addnew_id;
    public $updateMode = false;
   
    public function render()
    {
        
        $this->files = addnew::all();
        return view('livewire.pages.modal.createnew');
    }

    private function resetInputFields(){
        $this->Title = '';
        $this->Department = '';
        $this->Year = '';
 
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
           
        ]);

        addnew::create($validatedData);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }     

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $file = addnew::findOrFail($id);
        $this->addnew_id = $id;
        $this->Title= $file->Title;
        $this->Department = $file->Department;
        $this->Year= $file->Year;
 
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
            'Title' => 'required',
            'Department' => 'required',
            'Year' => 'required',
            

        ]);
  
        $files = addnew::find($this->newfile_id);
        $files->update([
            'Title' => $this->Title,
            'Department' => $this->Department,
            'Year' => $this->Year,
          
        ]);
  
        $this->updateMode = false;    
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        addnew::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');

    }
}
