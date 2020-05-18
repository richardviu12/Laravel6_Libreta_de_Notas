<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function _contruct()
    {
        $this->middleware('auth'); 
    }
    
  
    public function index(Request $Request) 
    {
        
        if($Request){
            $query =trim($Request->get('search')); 
          
            $users= User::where('name', 'LIKE', '%' . $query . '%') 
            ->orderBy('id', 'asc') 
            ->paginate(10); 
                      
            return view('usuarios.index', ['Enviar_aVista' =>$users, 'search'=>$query]);
        }
        
         
    }


    public function create()
    {
        return view('usuarios.create');
    }


    public function store(Request $request)
    {
        $usuario = new User(); 

        $usuario->name = request('name');  
        $usuario->email = request('email');
        $usuario->password = bcrypt(request('password'));

        $usuario->save();

        return redirect('/usuarios'); 
    }



    public function show($id)
    {
        return view('usuarios.show',['user' => User::findOrFail($id)]); 
        
    }

  
    public function edit($id)
    {
        return view('usuarios.edit',['user' => User::findOrFail($id)]); 
    }

   
    public function update(UserFormRequest $request, $id)  
    {
        $usuario = User::findOrFail($id); 

        $usuario->name = $request->get('name'); 
        $usuario->email = $request->get('email');
       
        $usuario->update();  
       
        return redirect('/usuarios'); 
    }

    
    public function destroy($id)
    {
        $usuario = User::FindOrFail($id); 

        $usuario->delete(); 

        return redirect('/usuarios'); 
    }
}
