<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {      
        $users = User::all();
        $borrowedBooks = Borrow::whereIn('user_id', $users->pluck('id'));
        return view('user_show', ['users' => $users, 'borrowedBooks' => $borrowedBooks]);
        
    }

    public function input()
    {

        return view('input_user');
    }

    public function inputData(Request $request)
{
    try {
       
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|min:8|confirmed', 
        ]);

        $hashedPassword = Hash::make($validatedData['password']);

       
        $validatedData['password'] = $hashedPassword;

       
        $user = User::create($validatedData);

       
        return redirect('/admin')->with('success', 'Data user berhasil ditambahkan');
    } catch (ValidationException $e) {
      
        return redirect('/register')->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
       
        dd($e->getMessage());
    }
}
    public function edit(Request $request, $id)
    {
        
        $user = User::findOrFail($id);

     
        return view('edit_user', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
     
        $user = User::findOrFail($id);

        
        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'status' => 'required|string',
        ]);

  
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];
        $user->status = $validatedData['status'];

   
        $user->save();

        
        return redirect('/admin')->with('success', 'Data user berhasil diperbarui');
    }

    public function delete(Request $request, $id)
    {
        
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        
        return redirect('/admin')->with('success', 'Data user berhasil dihapus');
    }
}
