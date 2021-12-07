<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontController@index')->name('welcome');
Route::get('course/{id}','FrontController@show')->name('show.course');
Route::get('success', function () { return view('success'); })->name('success');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['verified']], function() {


        Route::post('course/{id}','FrontController@subscribe')->name('subscribe.course');
        Route::post('/exam/{id}','Exam\ExamController@take_exam')->name('exams.take_exam');
        Route::get('/exam/{id}','Exam\ExamController@take_exam')->name('exams.take_exam');
        Route::post('/exams_submt','Exam\ExamController@exams_submt')->name('exams.exams_submt');
        Route::resource('/exams','Exam\ExamController');


        Route::group(['middleware' => ['role:User']], function() {
            
            /**************************** Route Student ****************************/
            Route::get('/home', 'HomeController@index')->name('home');
            /**************************** Route Student ****************************/
            /**************************** Route Student ****************************/
            Route::get('/courses_subscribed','Course\CourseController@subscribed')->name('courses.subscribed');
            /**************************** Route Student ****************************/
        });


        Route::group(['middleware' => ['role:Teacher']], function() {
            /**************************** Route Teacher ****************************/
            Route::get('teacher',       'Dashboard\TeacherDashboardController@index')->name('teacher');
            /**************************** Route Teacher ****************************/
        });

        Route::group(['middleware' => ['role:Admin']], function() {
            /**************************** Route Admin ****************************/
            Route::get('dashboard',    'Dashboard\AdminDashboardController@index')->name('dashboard');
            /**************************** Route Admin ****************************/
            /**************************** Route Users ****************************/
            Route::resource('users','User\UserController');
            Route::get('/users_upload_page','User\UserController@upload_page')->name('users.upload_page');
            Route::post('/users_csv_upload','User\UserController@upload_process')->name('users.upload_process');
            Route::get('/users_deleted_show','User\UserController@show_deleted')->name('users.show_deleted');
            Route::get('/users_restore/{id}','User\UserController@restore_single')->name('users.restore_single');
            Route::get('/users_bulk_restore','User\UserController@restore_bulk')->name('users.restore_bulk');
            Route::post('/users_bulk_delete','User\UserController@bulk_delet')->name('users.bulk_delet');
            Route::post('/users_permDelete/{id}','User\UserController@perm_Delete');
            Route::post('/users_check','User\UserController@check_users')->name('check.users');
            /**************************** Route Users ****************************/
            /**************************** Route Roles ****************************/
            Route::resource('roles','Role\RoleController');
            Route::get('/roles_deleted_show','Role\RoleController@show_deleted')->name('roles.show_deleted');
            Route::post('/roles_bulk_delete','Role\RoleController@bulk_delet')->name('roles.bulk_delet');
            Route::post('/roles_get','CommonFunctionController@get_Roles')->name('get.roles');
            /**************************** Route Roles ****************************/
            /**************************** Route Users ****************************/
            Route::resource('activities','Activity\ActivityController');
            Route::post('/activities_permDelete/{id}','Activity\ActivityController@perm_Delete');
            Route::get('/activities_clearlog','Activity\ActivityController@clearlog')->name('activities.clearlog');
            /**************************** Route Users ****************************/
            /**************************** Route Category ****************************/
            Route::resource('/categories','Category\CategoryController');
            Route::get('/categories_upload_page','Category\CategoryController@upload_page')->name('categories.upload_page');
            Route::post('/categories_csv_upload','Category\CategoryController@upload_process')->name('categories.upload_process');
            Route::get('/categories_download_csv','Category\CategoryController@download_sample_csv')->name('categories.download_csv');
            Route::get('/categories_export_csv','Category\CategoryController@export_categories')->name('categories.export_csv');
            Route::post('/categories_bulk_delete','Category\CategoryController@bulk_delet')->name('categories.bulk_delet');
            Route::get('/categories_restore/{id}','Category\CategoryController@restore_single')->name('categories.restore_single');
            Route::get('/categories_bulk_restore','Category\CategoryController@restore_bulk')->name('categories.restore_bulk');
            Route::get('/categories_deleted_show','Category\CategoryController@show_deleted')->name('categories.show_deleted');
            Route::post('/categories_permDelete/{id}','Category\CategoryController@perm_Delete');
            Route::post('/categories_bulk_permDelete','Category\CategoryController@perm_bulk_delet');
            Route::post('/categories_check','Category\CategoryController@check_categories')->name('check.categories');
            Route::post('/categories_get','Category\CategoryController@get_categories')->name('get.categories');
            /**************************** Route Category ****************************/
            /**************************** Route Tag ****************************/
            Route::resource('/tags','Tag\TagController');
            Route::get('/tags_upload_page','Tag\TagController@upload_page')->name('tags.upload_page');
            Route::post('/tags_csv_upload','Tag\TagController@upload_process')->name('tags.upload_process');
            Route::get('/tags_download_csv','Tag\TagController@download_sample_csv')->name('tags.download_csv');
            Route::get('/tags_export_csv','Tag\TagController@export_tags')->name('tags.export_csv');
            Route::post('/tags_bulk_delete','Tag\TagController@bulk_delet')->name('tags.bulk_delet');
            Route::get('/tags_restore/{id}','Tag\TagController@restore_single')->name('tags.restore_single');
            Route::get('/tags_bulk_restore','Tag\TagController@restore_bulk')->name('tags.restore_bulk');
            Route::get('/tags_deleted_show','Tag\TagController@show_deleted')->name('tags.show_deleted');
            Route::post('/tags_permDelete/{id}','Tag\TagController@perm_Delete');
            Route::post('/tags_bulk_permDelete','Tag\TagController@perm_bulk_delet');
            Route::post('/tags_check','Tag\TagController@check_tags')->name('check.tags');
            Route::post('/tags_get','Tag\TagController@get_tags')->name('get.tags');
            /**************************** Route Tag ****************************/
            /**************************** Route Currency ****************************/
            Route::resource('/currencies','Currency\CurrencyController');
            Route::get('/currencies_upload_page','Currency\CurrencyController@upload_page')->name('currencies.upload_page');
            Route::post('/currencies_csv_upload','Currency\CurrencyController@upload_process')->name('currencies.upload_process');
            Route::get('/currencies_download_csv','Currency\CurrencyController@download_sample_csv')->name('currencies.download_csv');
            Route::get('/currencies_export_csv','Currency\CurrencyController@export_currencies')->name('currencies.export_csv');
            Route::post('/currencies_bulk_delete','Currency\CurrencyController@bulk_delet')->name('currencies.bulk_delet');
            Route::get('/currencies_restore/{id}','Currency\CurrencyController@restore_single')->name('currencies.restore_single');
            Route::get('/currencies_bulk_restore','Currency\CurrencyController@restore_bulk')->name('currencies.restore_bulk');
            Route::get('/currencies_deleted_show','Currency\CurrencyController@show_deleted')->name('currencies.show_deleted');
            Route::post('/currencies_permDelete/{id}','Currency\CurrencyController@perm_Delete');
            Route::post('/currencies_bulk_permDelete','Currency\CurrencyController@perm_bulk_delet');
            Route::post('/currencies_check','Currency\CurrencyController@check_currencies')->name('check.currencies');
            Route::post('/currencies_get','Currency\CurrencyController@get_currencies')->name('get.currencies');
            /**************************** Route Currency ****************************/
            /**************************** Route Course ****************************/
            Route::resource('/courses','Course\CourseController');
            Route::get('/courses_upload_page','Course\CourseController@upload_page')->name('courses.upload_page');
            Route::post('/courses_csv_upload','Course\CourseController@upload_process')->name('courses.upload_process');
            Route::get('/courses_download_csv','Course\CourseController@download_sample_csv')->name('courses.download_csv');
            Route::get('/courses_export_csv','Course\CourseController@export_courses')->name('courses.export_csv');
            Route::post('/courses_bulk_delete','Course\CourseController@bulk_delet')->name('courses.bulk_delet');
            Route::get('/courses_restore/{id}','Course\CourseController@restore_single')->name('courses.restore_single');
            Route::get('/courses_bulk_restore','Course\CourseController@restore_bulk')->name('courses.restore_bulk');
            Route::get('/courses_deleted_show','Course\CourseController@show_deleted')->name('courses.show_deleted');
            Route::post('/courses_permDelete/{id}','Course\CourseController@perm_Delete');
            Route::post('/courses_bulk_permDelete','Course\CourseController@perm_bulk_delet');
            Route::post('/courses_check','Course\CourseController@check_courses')->name('check.courses');
            Route::post('/courses_get','Course\CourseController@get_courses')->name('get.courses');
            /**************************** Route Course ****************************/
            /**************************** Route Question ****************************/
            Route::resource('/questions','Question\QuestionController');
            Route::get('/questions_upload_page','Question\QuestionController@upload_page')->name('questions.upload_page');
            Route::post('/questions_csv_upload','Question\QuestionController@upload_process')->name('questions.upload_process');
            Route::get('/questions_download_csv','Question\QuestionController@download_sample_csv')->name('questions.download_csv');
            Route::get('/questions_export_csv','Question\QuestionController@export_questions')->name('questions.export_csv');
            Route::post('/questions_bulk_delete','Question\QuestionController@bulk_delet')->name('questions.bulk_delet');
            Route::get('/questions_restore/{id}','Question\QuestionController@restore_single')->name('questions.restore_single');
            Route::get('/questions_bulk_restore','Question\QuestionController@restore_bulk')->name('questions.restore_bulk');
            Route::get('/questions_deleted_show','Question\QuestionController@show_deleted')->name('questions.show_deleted');
            Route::post('/questions_permDelete/{id}','Question\QuestionController@perm_Delete');
            Route::post('/questions_bulk_permDelete','Question\QuestionController@perm_bulk_delet');
            Route::post('/questions_check','Question\QuestionController@check_questions')->name('check.questions');
            Route::post('/questions_get','Question\QuestionController@get_questions')->name('get.questions');
            /**************************** Route Question ****************************/
            /**************************** Route Answer ****************************/
            Route::resource('/answers','Answer\AnswerController');
            Route::get('/answers_upload_page','Answer\AnswerController@upload_page')->name('answers.upload_page');
            Route::post('/answers_csv_upload','Answer\AnswerController@upload_process')->name('answers.upload_process');
            Route::get('/answers_download_csv','Answer\AnswerController@download_sample_csv')->name('answers.download_csv');
            Route::get('/answers_export_csv','Answer\AnswerController@export_answers')->name('answers.export_csv');
            Route::post('/answers_bulk_delete','Answer\AnswerController@bulk_delet')->name('answers.bulk_delet');
            Route::get('/answers_restore/{id}','Answer\AnswerController@restore_single')->name('answers.restore_single');
            Route::get('/answers_bulk_restore','Answer\AnswerController@restore_bulk')->name('answers.restore_bulk');
            Route::get('/answers_deleted_show','Answer\AnswerController@show_deleted')->name('answers.show_deleted');
            Route::post('/answers_permDelete/{id}','Answer\AnswerController@perm_Delete');
            Route::post('/answers_bulk_permDelete','Answer\AnswerController@perm_bulk_delet');
            Route::post('/answers_check','Answer\AnswerController@check_answers')->name('check.answers');
            Route::post('/answers_get','Answer\AnswerController@get_answers')->name('get.answers');
            /**************************** Route Answer ****************************/
            /**************************** Route Assignment ****************************/
            Route::resource('/assignments','Assignment\AssignmentController');
            Route::get('/assignments_upload_page','Assignment\AssignmentController@upload_page')->name('assignments.upload_page');
            Route::post('/assignments_csv_upload','Assignment\AssignmentController@upload_process')->name('assignments.upload_process');
            Route::get('/assignments_download_csv','Assignment\AssignmentController@download_sample_csv')->name('assignments.download_csv');
            Route::get('/assignments_export_csv','Assignment\AssignmentController@export_assignments')->name('assignments.export_csv');
            Route::post('/assignments_bulk_delete','Assignment\AssignmentController@bulk_delet')->name('assignments.bulk_delet');
            Route::get('/assignments_restore/{id}','Assignment\AssignmentController@restore_single')->name('assignments.restore_single');
            Route::get('/assignments_bulk_restore','Assignment\AssignmentController@restore_bulk')->name('assignments.restore_bulk');
            Route::get('/assignments_deleted_show','Assignment\AssignmentController@show_deleted')->name('assignments.show_deleted');
            Route::post('/assignments_permDelete/{id}','Assignment\AssignmentController@perm_Delete');
            Route::post('/assignments_bulk_permDelete','Assignment\AssignmentController@perm_bulk_delet');
            Route::post('/assignments_check','Assignment\AssignmentController@check_assignments')->name('check.assignments');
            Route::post('/assignments_get','Assignment\AssignmentController@get_assignments')->name('get.assignments');
            /**************************** Route Assignment ****************************/
            /**************************** Route Exam ****************************/
            Route::get('/exams_download_csv','Exam\ExamController@download_sample_csv')->name('exams.download_csv');
            Route::get('/exams_export_csv','Exam\ExamController@export_exams')->name('exams.export_csv');
            Route::post('/exams_bulk_delete','Exam\ExamController@bulk_delet')->name('exams.bulk_delet');
            Route::get('/exams_restore/{id}','Exam\ExamController@restore_single')->name('exams.restore_single');
            Route::get('/exams_bulk_restore','Exam\ExamController@restore_bulk')->name('exams.restore_bulk');
            Route::get('/exams_deleted_show','Exam\ExamController@show_deleted')->name('exams.show_deleted');
            Route::post('/exams_permDelete/{id}','Exam\ExamController@perm_Delete');
            Route::post('/exams_bulk_permDelete','Exam\ExamController@perm_bulk_delet');
            Route::post('/exams_check','Exam\ExamController@check_exams')->name('check.exams');
            Route::post('/exams_get','Exam\ExamController@get_exams')->name('get.exams');
            /**************************** Route Exam ****************************/

        });

    });
});