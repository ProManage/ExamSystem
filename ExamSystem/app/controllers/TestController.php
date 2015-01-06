<?php

//学生对答卷的操作
class TestController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tests = TestPaper::all();
        return View::make('test.index', [
            'tests' => $tests
        ]);
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        if (Request::ajax()) {
            $testpaper = TestPaper::find($id);
            $testquestions = TestQuestion::where('testpaper_id', '=', $testpaper->id)->get();
            $questions = [];
            foreach ($testquestions as $tq) {
                $question = Question::find($tq->question_id);
                $answer = TestAnswer::FirstOrNew([
                    'username' => Auth::user()->username,
                    'testquestion_id' => $tq->id
                ]);
                $questions[] = [
                    'tqid' => $tq->id,
                    'type' => $question->type,
                    'content' => $question->content,
                    'value' => $tq->value,
                    'placement' => $tq->placement,
                    'answer' => $answer->answer
                ];
            }
            $data = [
                'testinfo' => $testpaper,
                'questions' => $questions
            ];
            return $data;
        } else
            return View::make('test.show');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public  function answer($id)
    {
        $test = TestPaper::find($id);
        if (time() > $test->end_time || time() < $test.start_time)
            return "not right time";
        $data = Input::all();
        foreach($data as $answer)
        {
            $testquestion = TestQuestion::find($answer['tqid']);
            if ($testquestion->testpaper_id != $id)
                continue;
            $testanswer = TestAnswer::FirstOrNew([
                'username' => Auth::user()->username,
                'testquestion_id' => $answer['tqid']
            ]);
            $testanswer-> testpaper_id = $id;
            $testanswer->answer = $answer['answer'];
            $testanswer->save();
        }
    }
}
