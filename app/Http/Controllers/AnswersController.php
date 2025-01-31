<?php

namespace App\Http\Controllers;

use App\Notifications\NewAnswerSubmitted;
use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => "required|min:15",
            'question_id' => 'required|integer'
        ]);

        $answer = new Answer();
        $answer->content = $request->get('content');
        $answer->user()->associate(Auth::id());

        $question = Question::findOrFail($request->get('question_id'));
        $question->answers()->save($answer);
        $question->user->notify(new NewAnswerSubmitted($answer, $question, Auth::user()->name ));

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
