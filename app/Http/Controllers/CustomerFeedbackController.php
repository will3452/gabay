<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CustomerFeedbackController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $book->status = 'completed';
        $book->save();
        Feedback::create([
            'message'=>$request->message,
            'star'=>$request->stars,
            'service_id'=>$book->service->id,
            'user_id'=>auth()->user()->id
        ]);
        alert('Feedback', 'submitted!');
        return back();
    }

}
