<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
//     return $request->user();
// });

// user logout route
Route::group(['prefix'=> 'user', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('/', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});

// Users registration, login and update route
Route::group(['prefix'=> 'user'], function(){
    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('register-user');

    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

    Route::put('update/{id}', [\App\Http\Controllers\Api\AuthController::class, 'updateUser']);
});

// classes routes
Route::apiResource('classes', App\Http\Controllers\Api\ClassesController::class);
Route::post('query_classes_table', [App\Http\Controllers\Api\ClassesController::class, 'queryClassesTable']);

// exam routes
Route::apiResource('exams', App\Http\Controllers\Api\ExamController::class);
Route::post('query_exams_table', [App\Http\Controllers\Api\ExamController::class, 'queryExamTable']);

// exam paper routes
Route::apiResource('exam_papers', App\Http\Controllers\Api\ExamPaperController::class);
Route::post('query_exam_papers_table', [App\Http\Controllers\Api\ExamPaperController::class, 'queryExamPaperTable']);
Route::post('get_exam_papers_by_class_timerange', [App\Http\Controllers\Api\ExamPaperController::class, 'getExamPaperByClassAndTimeRange']);

// questions routes
Route::apiResource('questions', App\Http\Controllers\Api\QuestionController::class);
Route::post('query_questions_table', [App\Http\Controllers\Api\QuestionController::class, 'queryQuestionTable']);
Route::post('questions/import', [App\Http\Controllers\Api\QuestionController::class, 'importQuestions']);

// question answers routes
Route::apiResource('question_answers', App\Http\Controllers\Api\QuestionAnswerController::class);
Route::post('query_question_answers_table', [App\Http\Controllers\Api\QuestionAnswerController::class, 'queryQuestionAnswerTable']);

// subjects routes
Route::apiResource('subjects', App\Http\Controllers\Api\SubjectController::class);
Route::post('query_subjects_table', [App\Http\Controllers\Api\SubjectController::class, 'querySubjectTable']);

// results routes
Route::apiResource('results', App\Http\Controllers\Api\ResultController::class);
Route::post('query_results_table', [App\Http\Controllers\Api\ResultController::class, 'queryResultTable']);

// teachers routes
Route::apiResource('teachers', App\Http\Controllers\Api\TeacherController::class);
Route::post('query_teachers_table', [App\Http\Controllers\Api\TeacherController::class, 'queryTeacherTable']);

// teacher classes routes
Route::apiResource('teacher_classes', App\Http\Controllers\Api\TeacherClassesController::class);
Route::post('query_teacher_classes_table', [App\Http\Controllers\Api\TeacherClassesController::class, 'queryTeacherClassesTable']);

// teacher subjects routes
Route::apiResource('teacher_subjects', App\Http\Controllers\Api\TeacherSubjectController::class);
Route::post('query_teacher_subjects_table', [App\Http\Controllers\Api\TeacherClassesController::class, 'queryTeacherSubjectTable']);

// students routes
Route::apiResource('students', App\Http\Controllers\Api\StudentController::class);
Route::post('query_students_table', [App\Http\Controllers\Api\StudentController::class, 'queryStudentTable']);
Route::post('students/promote', [App\Http\Controllers\Api\StudentController::class, 'promoteStudents']);

// years routes
Route::apiResource('years', App\Http\Controllers\Api\YearController::class);

// terms, routes
Route::apiResource('terms', App\Http\Controllers\Api\TermController::class);
Route::post('query_terms_table', [App\Http\Controllers\Api\TermController::class, 'queryTermTable']);

