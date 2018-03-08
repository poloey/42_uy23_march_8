## download video 
https://drive.google.com/file/d/1gNJXICVNVMNYIvRycDNmAXzfT-YCdMa3/view?usp=sharing

## or watch on youtube 
https://www.youtube.com/watch?v=l8lA34LZ-DI


## installing laravel 

~~~php
composer create-project laravel/laravel feni
~~~

## connecting with database in  .env file

~~~php
DB_DATABASE=feni
DB_USERNAME=root
DB_PASSWORD=
~~~

## defining default string maximum 191  chracter length inside AppServiceProvider boot method (If you using older mysql version. Normally we all are using older version)     

~~~php
  Schema::defaultStringLength(191);
~~~

## making model with migration, resource controller, factory by putting `a` flag

~~~php
php artisan make:model Note -a
~~~

## writing migration inside note migration file 

~~~php
$table->string('title');
$table->text('description');
$table->integer('complete')->default(0);
~~~

## migrate to database 

~~~php
php artisan migrate
~~~

## dropping all tables from database and create again 

~~~php
php artisan migrate:fresh
~~~

## write fake data inside note factory file 

~~~php
  'title' => $faker->sentence,
  'description' => $faker->paragraph(4),
~~~

## adding factory to database seed and tell how many row you want to seed 

~~~php
# inside DatabaseSeeder.php run method
factory(Note::class, 30)->create();
~~~

## seeding using artisan command   

~~~php
php artisan db:seed
~~~

## migration and seeding in same time 

~~~php
php artisan migrate --seed 
# or if you want to dropping earlier database tables and then seeding
php artisan migrate:fresh --seed 
~~~





## defining resource route 

~~~php
Route::resource('notes', 'NoteController');
~~~

## redirect in laravel 

~~~php
return redirect('notes');
~~~

## showing view and passing variable to a view from controller 

~~~php
public function index()
{
    $notes = Note::paginate(10);
    return view('notes.index', compact('notes'));
}
public function show(Note $note)
{
    return view('notes.show', compact('note'));
}
~~~

## passing variable to view 

~~~php
$notes = Note::paginate(10);
# passing variable to view in 4 different ways
return view('notes.index', compact('notes'));
return view('notes.index', ['notes' => $notes]);
return view('notes.index')->with('notes', $notes);
return view('notes.index')->withNotes($notes);
~~~

## yielding in master view for `content` section

~~~php
# inside master.blade.php
@yield('content')
~~~

## extends master in view file and write content inside `content` section    

~~~php
# inside index.balde.php
@extends('master')
@section('content')

@endsection
~~~

##  iterating variable using blade directives 

~~~html
@foreach($notes as $note)
<div class="card my-2">
  <div class="card-body">
    <h4>
      <a href="{{route('notes.show', $note->id)}}">
        {{$note->title}}
      </a>
    </h4>
  </div>
</div>
@endforeach
~~~

<!-- ## `echo` using `{% raw %}{{}}{% endraw %}`      -->

## `echo` using `{{}}`           

~~~html

## in php
<?php echo $hello ?>
# or
<?= $hello ?>

# in blade
{{ $hello }}    
~~~

# csrf and method inside form incase of creating, editing, deleting

~~~php
# cross site request forgery   
@csrf 
# for update
@method('put')
# for delete
@method('delete')
~~~

## how to validate a form  

~~~php
$this->validate($request, [
  'title' => 'required|min:3',
  'email' => 'required|min:3|email|unique:users',
]);
~~~

## how to show errors in from 

~~~php
@if (count($errors->all))
  foreach($errors->all() as $error)
    <li>{{$error}}</li>
  @endforeach
@endif
~~~

## paginate with orderBy 

~~~php
$notes = Note::orderBy('id', 'desc')->paginate(10);

# to show pagination links in blade file
$notes->links();
~~~

## how to run other people code on your pc

~~~php
composer install
php artisan config:clear
php artisan cache:clear
php artisan view:clear

copy .env.example file to .env file

php artisan key:generate

~~~







