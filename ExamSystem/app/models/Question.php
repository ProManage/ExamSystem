<?php
/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/4
 * Time: 15:06
 */
class Question extends Eloquent
{
    protected $table = 'questions';
    protected $fillable = ['type','content','answer','difficulty','labels'];
}