<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $model;
    
    function __construct($model) 
    {
        $this->model = $model;
    }    

    public function index()
    {
        return $this->model::all();        
    }

    public function store(Request $request)
    {  
        return $this->model::create($request->all());                  
    }

    public function show($id)
    {                
        return $this->model::findOrFail($id);  
    }

    public function update(Request $request, $id)
    {
        $this->model::findOrFail($id)->update($request->all());
        return $this->model::find($id);
    }

    public function destroy($id)
    {
        return $this->model::findOrFail($id)->delete();        
    }
     
}
