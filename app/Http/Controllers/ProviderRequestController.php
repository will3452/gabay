<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProviderRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index()
    {
        $status = request()->status ?? 'pending';
        if(auth()->user()->account->type != 'provider') return back();
        $books = Book::where('status',$status)->whereHas('service', function(Builder $query){
            $query->where('user_id', auth()->user()->id);
        })->get();
        return view('requests.index', compact('books'));
    }

   
    public function update(Request $request, $id)
    {
        if(empty($request->answer)) return back();

        $book = Book::find($id);
        if($request->answer == 'accept'){
            $book->status = 'in-progress';
        }else {
            $book->status = 'declined';
        }

        $book->save();
        alert()->success('success', 'Done!');
        return back();
    }

}
