<?php
/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/5
 * Time: 6:27
 */
class TestQuestion extends Eloquent
{
    protected $table = 'testquestions';
    protected $fillable = ['testpaper_id','question_id','placement','value'];
}