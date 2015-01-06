<?php
/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/7
 * Time: 3:42
 */
class TestAnswer extends Eloquent
{
    protected $table = 'testanswers';
    protected $fillable = ['username','testpaper_id','testquestion_id','answer','score'];
}