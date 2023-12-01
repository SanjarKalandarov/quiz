<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions=Question::all();
        return view('questions.questions',compact('questions'));
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
//        dd($request);
        $request->validate([
            'questions'=>'required',
            'optionA'=>'required',
            'optionB'=>'required',
            'optionC'=>'required',
            'optionD'=>'required',
            'ans'=>'required',
        ]);
        $questions=new Question();
        $questions->question=$request->questions;
        $questions->a=$request->optionA;
        $questions->b=$request->optionB;
        $questions->c=$request->optionC;
        $questions->d=$request->optionD;
        $questions->ans=$request->ans;
        $questions->save();
        Session::put('success',"Savol bazaga qoshildi!");
        return redirect(route('questions.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
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
        $request->validate([
            'questions'=>'required',
            'optionA'=>'required',
            'optionB'=>'required',
            'optionC'=>'required',
            'optionD'=>'required',
            'ans'=>'required',
        ]);
        $questions= Question::find($id);
        $questions->question=$request->questions;
        $questions->a=$request->optionA;
        $questions->b=$request->optionB;
        $questions->c=$request->optionC;
        $questions->d=$request->optionD;
        $questions->ans=$request->ans;
        $questions->save();
        Session::put('success',"Savol tahrirlandi!");
        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question=Question::find($id);
        $question->delete();
        Session::put('success',"Savol ochirildi!");
        return redirect(route('questions.index'));

    }
    public function startquiz(){
        Session::put('nextq',1);
        Session::put('wrongans',0);
        Session::put('correct',0);
        $questions=Question::all()->first();
        return view('answer.answerDesk')->with('question',$questions);
    }
    public function submitans(Request $request){
        $nextq=Session::get('nextq');
        $wrongans=Session::get('wrongans');
        $correct=Session::get('correct');
      $validate=$request->validate([
         'ans'=>'required',
         'dbans'=>'required'
      ]);

   $nextq++;
        if($request->dbans==$request->ans){
$correct++;
        }else {
            $wrongans++;
        }

        Session::put('nextq',$nextq);
        Session::put('wrongans',$wrongans);
        Session::put('correct',$correct);

        $i=0;
        $questions=Question::all();
        foreach ($questions as $question){
            $i++;
            if($question->count()<$nextq){
                return view('questions.end');
            }
            if($i==$nextq){
                return view('answer.answerDesk')->with(['question' => $question]);
            }
        }
    }

}
