<?php
/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/5
 * Time: 6:13
 */
class TestPaper extends Eloquent
{
    protected $table = 'testpapers';
    protected $fillable = ['creater','start_time','end_time'];
}