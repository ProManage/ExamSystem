<?php

//教师对试卷的操作
class TestPaperController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $testpapers = TestPaper::all();
        if (Request::ajax())
            return $testpapers;
        return View::make('testpaper.index',[
            'testpapers' => $testpapers
        ]) ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('testpaper.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $testpaper = TestPaper::create([
            'creater' => Auth::user()->username,
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
        foreach ($data['questions'] as $question) {
            TestQuestion::create([
                'testpaper_id' => $testpaper->id,
                'question_id' => $question['question_id'],
                'placement' => $question['placement'],
                'value' => $question['value'],
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        TestPaper::destroy($id);
        return Redirect::back();
    }


}
