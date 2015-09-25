/**
 * Created by Comzyh on 2015/1/4.
 */
var exsysControllers = angular.module('exsysControllers', []);
exsysControllers.controller('QuestionController', ['$scope', '$http', function ($scope, $http) {
    $scope.operate = $("#operate_value").val();
    $scope.question = {
        'choice': {
            'choices': {}
        },
        'filling': {},
        'saq': {},
        'answer': {},
        'difficulty': 1,
        'labels': ""
    };
    if ($scope.operate == 'create') {
        $scope.question.type = 'choice';
    }
    else {
        $scope.question.id = $("#question_id").val();
        $http.get($scope.root_url + "/questions/" + $scope.question.id).success(function (data) {
            var question = $scope.question;
            question.type = data.type;
            question.answer[data.type] = JSON.parse(data.answer);
            question.labels = data.labels;
            question.difficulty = data.difficulty;
            question[data.type] = JSON.parse(data.content);
        });
    }

    $scope.submit_question = function ($event) {
        var question = {
            'type': $scope.question.type,
            'content': $scope.question[$scope.question.type],
            'answer': $scope.question.answer[$scope.question.type],
            'difficulty': $scope.question.difficulty,
            'labels': $scope.question.labels || ""
        };
        var test_in = $("input[type='file'][name='test.in']");
        var test_out = $("input[type='file'][name='test.out']");

        var post_test_data = function () {
            var test_data = new FormData();
            if (test_in.val())
                test_data.append('test_in', test_in[0].files[0]);
            if (test_out.val())
                test_data.append('test_out', test_out[0].files[0]);
            $.ajax({
                url: $scope.root_url + '/testdata/' + $scope.question.id,
                type: 'POST',
                data: test_data,
                processData: false,
                contentType: false,
                async:false
            }, function (data) {
                console.log(data);
            });
        };
        if ($scope.operate == 'create') {
            $http.post('.', question).success(function (data) {
                $scope.question.id = data;
                post_test_data();
                window.location.href = $scope.root_url + "/questions/"
            });
        } else {
            question.id = $scope.question.id;
            $http.put('.', question).success(function () {
                post_test_data();
                window.location.href = $scope.root_url + "/questions/"
            });
        }
    }
}]);

exsysControllers.controller('listQuestionController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $scope.questions = [];
    $scope.qid_question_map = {}
    $http.get("").success(function (data) {
        for (var i in data) {
            data[i].content = JSON.parse(data[i].content);
            data[i].answer = JSON.parse(data[i].answer);
            data[i].selected = $rootScope.selected_questions[data[i].id];
            $scope.qid_question_map[data[i].id] = data[i];
        }
        $scope.questions = data;
    });
    $scope.type_map = {
        'choice': '选择题',
        'filling': '填空题',
        'saq': '简答题',
        'programing': '编程题'
    };
    $scope.selected_changed = function ($event, question) {
        $rootScope.$broadcast('selected_questions_changed', question.id, question.selected);
    }
    $scope.$on('selected_questions_changed', function ($event, qid, add) {
        $scope.qid_question_map[qid].selected = add;
    });
    $scope.delete_question = function (question) {
        $http.delete($rootScope.root_url + '/questions/' + question.id).success(function () {
            for (var i in $scope.questions) {
                if (question.id == $scope.questions[i].id) {
                    $scope.questions.splice(i, 1);
                    break;
                }
            }
        });
    }
}]);
exsysControllers.controller('selectQuestionController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $scope.isEmpty = function (obj) {
        for (var key in obj) {
            return false;
        }
        return true;
    }
    $scope.clear_selected = function () {
        var qids = [];
        for (var key in $rootScope.selected_questions)
            qids.push(key);
        for (var i in qids)
            $rootScope.$broadcast('selected_questions_changed', qids[i], false);
    }
    $scope.collapse = false
    $scope.toggle_collapse = function () {
        $scope.collapse = !$scope.collapse;
    };
}]);
exsysControllers.controller('createTestPaperController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    //$scope.qid_question_map = {};
    $scope.questions = [];
    $scope.testpaper = {};
    $http.get($rootScope.root_url + "/questions").success(function (data) {
        var questions = [];
        for (var i in data) {
            data[i].content = JSON.parse(data[i].content);
            data[i].answer = JSON.parse(data[i].answer);
            data[i].selected = $rootScope.selected_questions[data[i].id];
            data[i].value = 2;
            if (data[i].selected) {
                questions.push(data[i]);
            }
        }
        questions.sort(function (a, b) {
            if (a.type != b.type)
                return "choicefillingsaq".indexOf(a.type) - "choicefillingsaq".indexOf(b.type)
            else
                return a.id - b.id;
        });
        $scope.questions = questions;
    });
    $scope.submit_testpaper = function ($event) {
        $scope.testpaper.questions = [];
        var questions = $scope.testpaper.questions;
        for (var i in $scope.questions) {
            var question = $scope.questions[i];
            questions.push({
                'question_id': question.id,
                'placement': i,
                'value': question.value
            });
        }
        var data
        $http.post($rootScope.root_url + "/testpapers", $scope.testpaper).success(function () {
            window.location.href = $rootScope.root_url + "/testpapers"
        });
    };
    $scope.full_score = function () {
        var score = 0;
        for (var i in $scope.questions)
            score += $scope.questions[i].value;
        return score;
    }
}]);

exsysControllers.controller('testController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $http.get("").success(function (data) {
        var qs = data.questions;
        for (var i in qs) {
            qs[i].content = JSON.parse(qs[i].content);
            qs[i].answer = JSON.parse(qs[i].answer);
            qs[i].last_answer = qs[i].answer;
        }
        $scope.questions = qs;
        $scope.testinfo = data.testinfo;
    });
    $scope.update_answer = function (questions) {
        var data = [];
        var put_question = function (question) {
            if (question.last_answer == question.answer)
                return;
            question.last_answer = question.answer;
            data.push({
                'tqid': question.tqid,
                'answer': JSON.stringify(question.answer)
            });
            question.submiting = true;
        }
        if (questions instanceof Array) {
            for (var i in questions)
                put_question(questions[i]);
        }
        else
            put_question(questions);
        if (data.length != 0)
            $http.put($rootScope.root_url + '/tests/' + $scope.testinfo.id + '/answers', data).success(function () {
                for (var i in questions)
                    questions[i].submiting = false;
            });
    }
}]);

exsysControllers.controller('gradingController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $scope.full_score = 0;
    $http.get("").success(function (data) {
        var qs = data.questions;
        for (var i in qs) {
            qs[i].content = JSON.parse(qs[i].content);
            qs[i].answer = JSON.parse(qs[i].answer);
            qs[i].correct_answer = JSON.parse(qs[i].correct_answer);
            $scope.full_score += qs[i].value;
        }
        $scope.questions = qs;
        $scope.testinfo = data.testinfo;
        $scope.examinee = data.examinee;
    });
    $scope.total_score = function () {
        var score = 0;
        for (var i in $scope.questions)
            score += $scope.questions[i].score;
        return score;
    }
    $scope.auto_mark = function () {
        for (var i in $scope.questions) {
            var q = $scope.questions[i];
            if (q.type != 'programing')
                q.score = q.value * (q.correct_answer == q.answer)
        }
    }
    $scope.submit_score = function () {
        var data = [];
        for (var i in $scope.questions) {
            var question = $scope.questions[i];
            data.push({
                'tqid': question.tqid,
                'score': question.score
            });
        }
        $http.put("", data).success(function () {
            window.location.href = $rootScope.root_url + '/testpapers/' + $scope.testinfo.id + '/grading';
        });

    }
}]);