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
    }
}