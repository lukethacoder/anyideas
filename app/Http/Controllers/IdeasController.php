<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class Users extends Controller
// {
    
// }

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Curd;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Ideas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Ideas::all()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return 'create idea here'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $idea = Idea::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'pitch' => $request->pitch,
            'status' => $request->status,
            'description' => $request->description
        ]);

        $data = [
            'data' => $idea,
            'status' => (bool) $idea,
            'message' => $idea ? 'Idea Created' : 'Error Creating Idea',
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($title)
    {
        // return view('ideas',array('title' => $title));
        return response()->json($idea);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $status = $idea->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Idea Deleted!' : 'Error Deleting Idea'
        ]);

    }
}