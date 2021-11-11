<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Question;
use Auth;
use Illuminate\Http\Response;
use Illuminate\View\View;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(2);

        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $this->validate($request, [
           'title' => 'required|max:255'
        ]);
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        $question->user()->associate(Auth::id());

        if ($question->save()) {
            return redirect()->route('questions.show', $question->id);
        } else {
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        if ($question->user->id != Auth::id()){
            return abort(403);
        }

        return view('questions.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
