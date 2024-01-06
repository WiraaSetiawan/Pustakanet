<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
  
    public function index()
    {
      
    }

    
    public function input()
    {
        $categories=Category::all();

        return view('input',['categories'=>$categories]);
    }

    public function inputData(Request $request)
{
   
    $validatedData = $request->validate([
        'title' => 'required|string',
        'book_code' => 'required|string|unique:books',
        'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'author' => 'required|string',
        'publish_year' => 'required|string',
        'sipnosis' => 'required|string',
        'pages' => 'required|string',
    ]);

    $book = new Book();

    $book->title = $validatedData['title'];
    $book->book_code = $validatedData['book_code'];

    if ($request->hasFile('cover_img')) {
        $coverImage = $request->file('cover_img');
        $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
        $coverImage->move(public_path('img'), $coverImageName);

        $book->cover_img = $coverImageName;
    }

    $book->author = $validatedData['author'];
    $book->publish_year = $validatedData['publish_year'];
    $book->sipnosis = $validatedData['sipnosis'];
    $book->pages = $validatedData['pages'];
    $book->status = "Tersedia";

    
    $book->save();
    $book->categories()->sync($request->categories);
    
    return redirect('/admin')->with('success', 'Data berhasil ditambahkan'); 
  }  

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $categories=Category::all();

        return view('edit', ['book' => $book,'categories'=>$categories]);
    }

 
    
    
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
    
        $validatedData = $request->validate([
            'title' => 'required|string',
            'cover_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'author' => 'required|string',
            'publish_year' => 'required|string',
            'sipnosis' => 'required|string',
            'pages' => 'required|string',
            'categories' => 'array', // Pastikan 'categories' merupakan array
        ]);
    
    
        $book->title = $validatedData['title'];
    if ($request->hasFile('cover_img')) {
        $coverImage = $request->file('cover_img');
        $coverImageName = time() . '_' . $coverImage->getClientOriginalName();
        $coverImage->move(public_path('img'), $coverImageName);


        if ($book->cover_img) {
           
            unlink(public_path($book->cover_img));
        }
      
        $book->cover_img = 'img/' . $coverImageName;
    }

    
        $book->author = $validatedData['author'];
        $book->publish_year = $validatedData['publish_year'];
        $book->sipnosis = $validatedData['sipnosis'];
        $book->pages = $validatedData['pages'];
    
        
        if ($request->has('categories')) {
           
            $book->categories()->detach();
    
           
            $book->categories()->attach($request->input('categories'));
        }
    
        
        $book->save();
    
        return redirect('/admin')->with('success', 'Data berhasil diperbarui');
    }
    

  
    public function delete(Request $request, $id)
    {
        $book = Book::findOrFail($id);
    
        
        $book->categories()->detach();
    
        
        $book->delete();
    
        return redirect('/admin')->with('success', 'Data berhasil dihapus');
    }
     public function showBookList()
    {
        $books = Book::all();
        return
         view('book_list', ['books' => $books]);
    }
    public function showBookstatus(){

    $userId = Auth::id();

    
    $borrows = Borrow::where('user_id', $userId)->get();

    return view('daftar_pinjaman', compact('borrows'));}

 public function showDetail($slug)
{
    $book = Book::where('slug', $slug)->firstOrFail();
    $categories = Category::all();

    return view('detail_book', ['book' => $book, 'categories' => $categories]);
    }
    

}
