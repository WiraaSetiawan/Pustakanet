<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class PerpusController extends Controller
{
    public function main()
    {
        return view('main');
    }

   
    public function admin()
    {
        $books = Book::all();
        return view('admin', ['books' => $books]);
    }
    public function profile()
    {
        $user = User::all();
        return view('/profile', ['user' => $user]);
    }
    public function show_borrow()
    {
    
        $borrows = Borrow::all();
    
       
        $bookIds = $borrows->pluck('book_id')->toArray();
        $userIds = $borrows->pluck('user_id')->toArray();
    
        $books = Book::whereIn('id', $bookIds)->get();
        $users = User::whereIn('id', $userIds)->get();
    
        return view('borrow', compact('borrows', 'books', 'users'));
    }
    
 
}
