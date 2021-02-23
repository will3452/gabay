<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = request()->status ?? 'pending';
        $books = auth()->user()->books()->where('status', $status)->get();
        return view('books.index', compact('books'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'service_id'=>'required',
            'payment_value'=>'required',
            'proof'=>'required',
            'address'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);

        $validated['proof'] = $validated['proof']->store('/public/proof');

        auth()->user()->books()->create($validated);
        alert()->success('booking', 'Success');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
