<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function show(Book $book)
    {
        return view('/borrowBook', compact('book'));
    }

    public function pengembalian(Book $book)

{ 
    $borrow = Borrow::where('book_id', $book->id)->first();

   
    $book->update(['status' => 'Tersedia']);

  
    if($borrow){
    $borrow->delete();}

    

    return view('/daftar_pinjaman', compact('book'));
}


    public function store(Request $request, Book $book)
    {
        $user = Auth::user();
    
      
        $request->validate([
            'return_date' => 'required|date',
        ]);
    
        
        $isBookAvailable = Borrow::where('book_id', $book->id)
            ->where('status', 'pending')
            ->exists();
    
        if ($isBookAvailable) {
            return redirect()->route('books.show', ['book' => $book->id])
                ->with('error', 'Buku sudah dipinjam dan tidak tersedia saat ini.');
        }
    
       
        $borrow = new Borrow([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'borrow_date' => now(),
            'return_date' => $request->return_date,
            'status' => 'tersedia', 
        ]);
    
        $borrow->save();
    
        
        $book->update(['status' => 'tidak tersedia']);
    
        
    
        return redirect()->route('pinjaman', ['book' => $book->id])
                         ->with('success', 'Buku berhasil dipinjam.');
    }
}