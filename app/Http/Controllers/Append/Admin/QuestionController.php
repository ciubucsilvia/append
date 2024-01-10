<?php

namespace App\Http\Controllers\Append\Admin;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Repositories\QuestionRepository;

class QuestionController extends AdminController
{
    private $questionRepository;

    public function __construct()
    {
        parent::__construct();

        $this->title = 'Question';
        $this->folder = 'questions';

        $this->questionRepository = app(QuestionRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->user->can('view questions')) abort('401');

        $this->title .= 's';

        $items = $this->questionRepository->getAllWithPaginate();
        
        $this->content = view($this->theme . '.admin.questions.index', 
            compact('items'));

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!$this->user->can('create question')) abort('401');

        $this->title .= '::create';
        
        $this->content = view($this->theme . '.admin.questions.create');

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        if(!$this->user->can('store question')) abort(401);
        $data = $request->all();
        
        $question = $this->questionRepository->create($data);
        
        if($question) {
            return redirect()
            ->route('admin.questions.index')
            ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        if(!$this->user->can('show question')) abort(401);

        $this->content = view(env('THEME') . '.admin.questions.show', 
            compact('question'));
        return $this->renderOutput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        if(!$this->user->can('edit question')) abort(401);
        $this->title .= '::edit';
        $this->content = view(env('THEME') . '.admin.questions.edit', 
            compact('question'));
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        if(!$this->user->can('update question')) abort(401);
        $data = $request->all();
        
        $question->update($data);

        if($question) {
            return redirect()
            ->route('admin.questions.index')
            ->with(['success' => "Question: $question->name updated!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Save error!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        if(!$this->user->can('delete question')) abort(401);
        $questionId = $question->id;

        $question->delete();
        
        return redirect()
            ->route('admin.questions.index')
            ->with(['success' => "Question: $questionId deleted!"]);
    }
}
