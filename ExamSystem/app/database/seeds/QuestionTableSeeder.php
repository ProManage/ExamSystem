<?php

/**
 * Created by PhpStorm.
 * User: Comzyh
 * Date: 2015/1/4
 * Time: 6:24
 */
class QuestionTableSeeder extends Seeder
{
    public function run()
    {
        Question::create(array(
            'type' => 'choice',
            'content' => '{"choices":{"A":"\u6bcf\u4e2a\u7c7b\u6700\u591a\u53ea\u80fd\u6709\u4e00\u4e2a\u76f4\u63a5\u57fa\u7c7b","B":"\u6d3e\u751f\u7c7b\u4e2d\u7684\u6210\u5458\u53ef\u4ee5\u8bbf\u95ee\u57fa\u7c7b\u4e2d\u7684\u4efb\u4f55\u6210\u5458","C":"\u57fa\u7c7b\u7684\u6784\u9020\u51fd\u6570\u5fc5\u987b\u5728\u6d3e\u751f\u7c7b\u7684\u6784\u9020\u51fd\u6570\u4f53\u4e2d\u8c03\u7528","D":"\u6d3e\u751f\u7c7b\u9664\u4e86\u7ee7\u627f\u57fa\u7c7b\u7684\u6210\u5458\uff0c\u8fd8\u53ef\u4ee5\u5b9a\u4e49\u65b0\u7684\u6210\u5458"},"description":"\u4e0b\u5217\u5173\u4e8e\u57fa\u7c7b\u548c\u6d3e\u751f\u7c7b\u5173\u7cfb\u7684\u53d9\u8ff0\u4e2d\uff0c\u6b63\u786e\u7684\u662f"}',
            'answer' => '"D"',
            'difficulty' => 3,
            'labels' => '继承,C++'
        ));
        Question::create(array(
            'type' => 'filling',
            'content' => '{"description":"C++\u7a0b\u5e8f\u7684\u6269\u5c55\u540d\u4e3a"}',
            'answer' => '"cpp"',
            'difficulty' => 1,
            'labels' => 'C++,基础'
        ));
        Question::create(array(
            'type' => 'saq',
            'content' => '{"description":"C++\u4e2d\u6709\u54ea\u51e0\u79cd\u5e38\u91cf\uff0c\u7ed9\u51fa\u5b9e\u4f8b\u3002"}',
            'answer' => '"\u6574\u578b\u5e38\u91cf,\u6d6e\u70b9\u5e38\u91cf,\u5b57\u7b26\u5e38\u91cf,\u5b57\u7b26\u4e32\u5e38\u91cf,\u6807\u8bc6\u5e38\u91cf,\u6362\u7801\u5e8f\u5217"',
            'difficulty' => 4,
            'labels' => 'C++,常量,基础'
        ));
        Question::create(array(
            'type' => 'choice',
            'content' => '{"choices":{"A":"_123","B":"go_to","C":"long1","D":"void"},"description":"1.\u4e0b\u5217\u4e00\u4e2a\u4e0d\u5408\u6cd5\u7684\u53d8\u91cf\u540d\u662f\uff08 \uff09"}',
            'answer' => '"D"',
            'difficulty' => 4,
            'labels' => 'C++,C++关键字'
        ));
    }
}