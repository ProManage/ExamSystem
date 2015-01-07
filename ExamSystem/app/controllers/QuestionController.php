<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::ajax())
		{
			$questions = Question::all();
			return $questions;
		}
		else
			return View::make('question.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('question.create',[
			'operate' => 'create'
		]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$data = Input::only(['type','content','answer','difficulty','labels']);
		$data['content'] = json_encode($data['content']);
		$data['answer'] = json_encode($data['answer']);
		$new_question  = Question::create($data);


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::find($id);
		if (Request::ajax())
			return $question;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('question.create',[
			'question_id' => $id,
			'operate' => 'edit'
		]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$question  = Question::find($id);
		$data = Input::all();
		$question -> type = $data['type'];
		$question -> content = json_encode($data['content']);
		$question -> answer = json_encode($data['answer']);
		$question -> difficulty = $data['difficulty'];
		$question -> labels = $data['labels'];
		$question -> save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Question::destroy($id);
	}


}
