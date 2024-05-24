<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $book = Book::create($request->all());

        return response()->json(
            [
                "status" => true,
                "message" => "Record Created Successfully",
                "data" => $book
            ]
            ,
            200
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    "status" => false,
                    "message" => $ex->getMessage()
                    // "message" => "No data available against given id"
                ]
                ,
                404
            );
        }

        return response()->json(
            [
                "status" => true,
                "record" => $book
            ]
            ,
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($request->all());

            return response()->json(
                [
                    "status" => true,
                    "message"=> 'Record updated Successfully',
                    "record" => $book
                ]
                ,
                200
            );

        } catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    "status" => false,
                    "message" => $ex->getMessage()
                    // "message" => "No data available against given id"
                ]
                ,
                404
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json(
                [
                    "status" => true,
                    "message"=> 'Record deleted Successfully',
                    "record" => $book
                ]
                ,
                200
            );

        } catch (ModelNotFoundException $ex) {
            return response()->json(
                [
                    "status" => false,
                    "message" => $ex->getMessage()
                    // "message" => "No data available against given id"
                ]
                ,
                404
            );
        }
    }
}
