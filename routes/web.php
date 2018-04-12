<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('kajiankoding',function(){ //anonymous function karena ga ada namanya
  return view('index');
});
*/
/*
Route::get('/event',function(){
  return view('event');
});
*/
/*
Route::get('/detailevent',function(){
  return view('detailevent');
});

Route::get('/myevent',function(){
  return view('myevent');
});
*/
Route::get('/','UserIndexController@index');
Route::get('/event','UserIndexController@event');
//ROUTE INDEX users START
Route::group(['prefix'=>'users','middleware' => ['auth', 'role:member']], function(){
  route::get('/','UserIndexController@myevent');
  route::get('{id}/detailevent','UserIndexController@detailevent');
  route::post('{id}/daftar','UserIndexController@daftar');
  route::post('{id}','UserIndexController@destroy');
});
//ROUTE INDEX USERS END

// ROUTE ADMIN
Route::group(['prefix'=>'admin','middleware' => ['auth', 'role:admin']],function(){

  route::get('/',function(){
    return view('admin.dashboard');
  });

  route::get('/logout','AdminUsersController@logout');

  // ROUTE EVENT START
  route::group(['prefix'=>'event'],function(){
    //route ke controller event method index
    route::get('/','EventController@index');
    route::get('create','EventController@create');
    route::post('/','EventController@store');
    route::get('{id}/edit','EventController@edit');
    route::post('{id}/update','EventController@update');
    route::delete('{id}','EventController@destroy');
    route::get('pdf','LaporanController@eventpdf');
    route::get('excel','LaporanController@eventexcel');


    /*
    route::get('/',function(){
        return view('admin.event.index');
    });


    route::get('create',function(){
        return view('admin.event.create');
    });

    route::get('edit',function(){
        return view('admin.event.edit');
    });
    */

  });

  // ROUTE EVENT END
  // ROUTE EVENT USERS START
    route::group(['middleware' => ['auth', 'role:admin']],function(){
    Route::resource('users','BebasController');
    /*
    route::get('/','AdminUsersController@index');
    route::get('create','AdminUsersController@create');
    route::post('/', 'AdminUsersController@store');
    route::get('{id}/edit','AdminUsersController@edit');
    route::post('{id}/update','AdminUsersController@update');
    route::post('{id}','AdminUsersController@destroy');
    */
    /*
    route::get('/',function(){
        return view('admin.users.index');
    });

    route::get('create',function(){
        return view('admin.users.create');
    });

    route::get('edit',function(){
        return view('admin.users.edit');
    });
    */

  });
  // ROUTE USERS END
  // ROUTE PESERTA START
  route::group(['prefix'=>'peserta'], function(){
    route::get('/','PesertaController@index');
    route::get('{id}/view','PesertaController@view');
    route::post('{id}','PesertaController@destroy');

    /*
    route::get('/',function(){
        return view('admin.peserta.index');
    });

    route::get('peserta',function(){
        return view('admin.peserta.peserta');
    });
    */

  });
  // ROUTE PESERTA END

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/coba','BebasController@coba');
