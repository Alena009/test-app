<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Display;
use Illuminate\Support\Facades\DB;
use App\Models\Reseller;

class DisplayController extends BaseController
{
    function __construct(Display $display) {
        parent::__construct($display);        
    } 
    
    public function index()
    {
        return view('welcome', ['displays' => DB::table('displays')->simplePaginate(15)]);
    }
    
    public function show($id) 
    {
        $display = parent::show($id);
        return view('showDisplay', ['display' => $display]);
    }
    
    public function create()
    {                
        return view('createDisplay', ['resellers' => Reseller::all()]);
    }  
    
    public function edit($id)
    {  
        $display = parent::show($id);
        return view('editDisplay', ['display' => $display, 'resellers' => Reseller::all()]);
    } 
    
    public function destroy($id) 
    {
        if (prent::destroy($id)) {
            return redirect()->back()->with('success', 'Display was deleted!'); 
        }
        return redirect()->back()->withErrors(['message' => 'Display was not deleted']);
    }    

    public function store(Request $request)
    {
        $newDisplay = parent::store($request);
        if ($newDisplay) {
            if ($request->hasFile('file_path')) {               
                $filename = $newDisplay->id . '.' . request()->file_path->getClientOriginalExtension();           
                if ($filename) {         
                    request()->file_path->move('img/', $filename);
                    $newDisplay->file_path = 'img/'.$filename;   
                    $newDisplay->save();
                } 
            }         
            return redirect()->back()->with('success', 'Display was added!'); 
        }
        return redirect()->back()->withErrors(['message' => 'Display was not added']);
    }
    
    public function update(Request $request, $id)
    {
        $display = parent::show($id);
        if ($display) {
            if ($request->hasFile('file_path')) {               
                $filename = $display->id . '.' . request()->file_path->getClientOriginalExtension();           
                if ($filename) {   
                    if ($display->file_path){
                        $this->deletePicture('img/' . $display->file_path);                    
                    }                      
                    request()->file_path->move('img/', $filename); 
                    $display->update(['file_path' => 'img/'.$filename]); 
                } 
            }         
            return redirect()->back()->with('success', 'Display was changed!'); 
        }
        return redirect()->back()->withErrors(['message' => 'Display was not changed']);
    } 
    
    public function deletePicture($filename)
    {
        if (file_exists($filename)) {
            return unlink($filename);
        }        
        return true;
    }     

}
