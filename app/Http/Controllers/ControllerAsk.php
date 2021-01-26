<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class ControllerAsk extends Controller
{
    public function index()
    {
        $post = Question::all()->toArray();
        return array_reverse($post);
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
    public function add(Request $request)
    {
        $book = new Question([
            'name' => $request->input('name'),
            'question' => $request->input('question')
        ]);
        $book->save();

        return response()->json('The book successfully added');
    }
    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'question' => 'required',
            
        ]);

        return User::create([
           'name' => $request['name'],
           'question' => $request['question'],
           
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Question::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return response()->json($question);
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
        $question = Question::find($id);
        $question->update($request->all());

        return response()->json('Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Question::find($id);
        $book->delete();

        return response()->json('Deletado com sucesso!');
    }
}
