<?php

/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/9/25
 * Time: 5:29
 */
class TestDataController extends BaseController
{
    public function store($question_id)
    {
        $path = storage_path() . "\\testdata\\" . $question_id;
        if (Input::hasFile('test_in')) {
            Input::file('test_in')->move($path, 'test.in');
        }
        if (Input::hasFile('test_out')) {
            Input::file('test_out')->move($path, 'test.out');
        }
    }

    public function get($question_id, $io)
    {
        $pathToFile = storage_path() . "\\testdata\\" . $question_id . "\\test." . $io;
        return Response::download($pathToFile,"test." . $io, array('Content-Type' => 'text/plain'));
    }

}