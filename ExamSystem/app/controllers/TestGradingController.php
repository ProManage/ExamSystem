<?php

//教师评分
class TestGradingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($testpaper_id,$username)
	{
		if (Request::ajax()) {
			$testpaper = TestPaper::find($testpaper_id);
			$examinee = User::where('username','=',$username)->firstOrFail();
			$testquestions = TestQuestion::where('testpaper_id', '=', $testpaper->id)->get();
			$questions = [];
			foreach ($testquestions as $tq) {
				$question = Question::find($tq->question_id);
				$answer = TestAnswer::FirstOrNew([
					'username' => $username,
					'testquestion_id' => $tq->id
				]);
				$questions[] = [
					'tqid' => $tq->id,
					'type' => $question->type,
					'content' => $question->content,
					'value' => $tq->value,
					'placement' => $tq->placement,
					'answer' => $answer->answer,
					'correct_answer' => $question->answer,
					'score' => $answer->score,
				];
			}
			$data = [
				'testinfo' => $testpaper,
				'examinee' => $examinee,
				'questions' => $questions
			];
			return $data;
		} else
			return View::make('test.grading');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
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
	}


}
