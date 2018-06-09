<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Validator;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books      = Book::all();
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validatorr  = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'desc'  => 'required|string|max:255',
        ]);
        if($Validatorr->fails()){
            return response()->json($Validatorr->errors());
        }
        $book       = new Book;
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->save();
        return response()->json($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book   = Book::find($id);
        if(!$book){
            return response()->json(['failed' => 'book not found']);
        }
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $Validatorr  = Validator::make($request->all(), [
            'name'  => 'nullable|string|max:255',
            'desc'  => 'nullable|string|max:255',
        ]);
        if($Validatorr->fails()){
            return response()->json($Validatorr->errors());
        }
        $book       = Book::find($id);
        if(!$book){
            return response()->json(['failed' => 'book not found']);
        }
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->save();
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book       = Book::find($id);
        if(!$book){
            return response()->json(['failed' => 'book not found']);
        }
        $book->delete();
        return response()->json(['success' => 'book deleted']);
    }
}
