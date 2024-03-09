<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/comp', function(){
    return view("comp", ['students'=> App\Models\student::all()]);
});

Route::get('/comp-api', function(Illuminate\Http\Request $request){
    return view("components.question.test", ['message'=> $request->message]);
});

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return redirect(route('portal'));
});

Route::get('/todo', function() {
    return Inertia::render('TodoApp');
});

Route::get('/lte', function() {
    return Inertia::render('TestLTEComponent');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



// Route::get('/admin', function(){
//     return redirect('dashboard');
// })->name('admin')->middleware('admin');

// Route::get('/dashboard', function(){
//     return view('portal.dashboard');
// })->name('dashboard')->middleware('admin');

Route::group(['prefix'=> 'portal', 'middleware'=> 'admin'], function(){
    Route::get('/', function(){
        return redirect(route('portal-dashboard'));
    })->name('admin');
    
    Route::get('/dashboard', function(){
        return view('portal.dashboard');
    })->name('portal');
});

Route::group(['prefix'=> 'portal'], function(){
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginForm'])->name('portal-login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'loginSubmit'])->name('portal-login-submit');
    Route::get('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('portal-logout')->middleware('admin');
});


Route::group(['prefix'=> 'student'], function(){
    Route::get('/login', [\App\Http\Controllers\Student\AuthController::class, 'loginForm'])->name('student-login');
    Route::post('/login', [\App\Http\Controllers\Student\AuthController::class, 'loginSubmit'])->name('student-login-submit');
    Route::get('/logout', [\App\Http\Controllers\Student\AuthController::class, 'logout'])->name('student-logout')->middleware('student');
    Route::get('/welcome', [\App\Http\Controllers\Student\AuthController::class, 'welcome'])->name('student-welcome')->middleware('student');
    
    Route::get('/exam', [\App\Http\Controllers\Student\ExamController::class, 'exam_view'])->middleware('student');

    Route::post('/set-exam', [\App\Http\Controllers\Student\ExamController::class, 'set_exam'])->name('set-exam')->middleware('student');
    Route::post('/submit-exam', [\App\Http\Controllers\Student\ExamController::class, 'submit_exam'])->name('submit-exam')->middleware('student');

});


Route::group(['prefix'=> 'manage', 'middleware'=> 'admin'], function(){
    // question and answer routes
    Route::get('questions/options', [\App\Http\Controllers\Admin\QuestionController::class, 'selectOptions'])->name('manage-questions-options');
    Route::get('questions', [\App\Http\Controllers\Admin\QuestionController::class, 'index'])->name('manage-questions');
    
    // exams routes
    Route::get('exams/options', [\App\Http\Controllers\Admin\ExamController::class, 'selectOptions'])->name('manage-exams-options');
    Route::get('exams', [\App\Http\Controllers\Admin\ExamController::class, 'index'])->name('manage-exams');

    // exam papers routes
    Route::get('exam-papers/options', [\App\Http\Controllers\Admin\ExamPaperController::class, 'selectOptions'])->name('manage-exam-papers-options');
    Route::get('exam-papers', [\App\Http\Controllers\Admin\ExamPaperController::class, 'index'])->name('manage-exam-papers');
    
    // year route
    Route::get('years', [\App\Http\Controllers\Admin\YearController::class, 'index'])->name('manage-years');

    // classes route
    Route::get('classes', [\App\Http\Controllers\Admin\ClassesController::class, 'index'])->name('manage-classes');

    // classes route
    Route::get('subjects', [\App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('manage-subjects');

    // terms route
    Route::get('terms', [\App\Http\Controllers\Admin\TermController::class, 'index'])->name('manage-terms');

    // teachers route
    Route::get('teachers', [\App\Http\Controllers\Admin\TeacherController::class, 'index'])->name('manage-teachers');

    // students routes
    Route::get('students/options', [\App\Http\Controllers\Admin\StudentController::class, 'selectOptions'])->name('manage-students-options');
    Route::get('students', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('manage-students');

    // results routes
    Route::get('results/options', [\App\Http\Controllers\Admin\ResultController::class, 'selectOptions'])->name('manage-results-options');
    Route::get('results', [\App\Http\Controllers\Admin\ResultController::class, 'index'])->name('manage-results');
});

Route::get('/report/{studentId}', function($studentId){
    $student = App\Models\Student::find($studentId);
    $results = App\Models\Result::with('subject', 'exam', 'exam_paper', 'student', 'year', 'term', 'classes')->where('student_id', $studentId)->get();
    return view('portal.results.report', ['results'=> $results, 'student'=>$student]);
})->name('report')->middleware('admin');

Route::group(['prefix'=> 'components', 'middleware'=> 'admin'], function(){
    Route::get('question-area', [\App\Http\Controllers\Admin\ComponentsController::class, 'questionArea']);
    Route::get('question-answer-area', [\App\Http\Controllers\Admin\ComponentsController::class, 'questionAnswerArea']);
    Route::get('question-table-body-row', [\App\Http\Controllers\Admin\ComponentsController::class, 'questionTableBodyRow']);
    
    Route::get('general-table-body-row-3-col', [\App\Http\Controllers\Admin\ComponentsController::class, 'generalTableBodyRow3Col']);

    Route::get('exam-table-body-row', [\App\Http\Controllers\Admin\ComponentsController::class, 'examTableBodyRow']);

    Route::get('exam-paper-table-body-row', [\App\Http\Controllers\Admin\ComponentsController::class, 'examPaperTableBodyRow']);

    Route::get('teacher-classes-area', [\App\Http\Controllers\Admin\ComponentsController::class, 'teacherClassesArea']);
    
    Route::get('teacher-subjects-area', [\App\Http\Controllers\Admin\ComponentsController::class, 'teacherSubjectsArea']);

    Route::get('teacher-table-body-row', [\App\Http\Controllers\Admin\ComponentsController::class, 'teacherTableBodyRow']);

    Route::get('student-table-body-row', [\App\Http\Controllers\Admin\ComponentsController::class, 'studentTableBodyRow']);

    // Route::get('question', [\App\Http\Controllers\Admin\QuestionController::class, 'login']);
});