<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route; 

class task {


    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ){

    }
}
$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 descreption',
        'Task 1 long description',
         false,
         '2023-03-01 12:00:00',
         '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'sell old stuff',
        'Task 2 description',
         null,
         false,
         '2023-03-02 12:00:00',
         '2023-03-02 12:00:00'

    ),
    new Task(
         3,
        'Learn programing',
        'Task 3 description',
         'Task 3 long Description',
         true,
         '2023-03-03 12:00:00',
         '2023-03-03 12:00:01'
    ),
    new Task(
        4,
        'Take dogs for a walk ',
        'task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
    ];
Route:: get('/', function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()use ($tasks) {
    return view('index', [
        'tasks'=>  $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function($id) use ($tasks){
    $task = collect($tasks)->firstwhere('id', $id);
    if(!$tasks){
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show',['task'=> $task]);
})->name('tasks.show');




















// Route::get('/xxx', function(){
//     return "Hello";
// })->name("hello");
// Route:: get('/hallo', function(){
//     return redirect()->route('hello');
// });
// Route::get('/greet/{name}', function($name){
//     return 'hello '. $name . "!";
// });
Route::fallback(function(){
    return'still got somewhere';
});
