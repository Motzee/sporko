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
Route::get('/articles', function () {
    $articles = [
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "Vivamus id massa ac ex rutrum vestibulum.",
    "Nam purus justo, porttitor vel urna id, blandit aliquam orci."
] ;
    
    return view('articles', [
        'articles' => $articles
    ]);
})->name('articles');


Route::get('/article/{index}', function ($index) {
    $articles = [
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "Vivamus id massa ac ex rutrum vestibulum.",
    "Nam purus justo, porttitor vel urna id, blandit aliquam orci."
    ] ;
    
    if($index < count($articles)) {
        return view('article', [
            'article' => $articles[$index]
        ]);
    } else {
        return redirect()->route('articles');
    }
    
})->where('index', '[0-9]+')->name('article');

Route::get('/par/{year?}/{tag?}', function ($year = null, $tag = null) {
    $articles = [
        [
            "title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "year" => 2018,
            "tags" => ["Lorem", "Ipsum"]
        ],
        [
            "title" => "Vivamus id massa ac ex rutrum vestibulum.",
            "year" => 2018,
            "tags" => ["Lorem", "Massa"]
        ],
        [
            "title" => "Nam purus justo, porttitor vel urna id, blandit aliquam orci.",
            "year" => 2017,
            "tags" => ["Ipsum", "Massa"]
        ],
    ] ;
    
    $selection = [] ;
    
    if(isset($year) && $year > 2010) {
        foreach($articles as $article) {
            if($article["year"] == $year) {
                if(isset($tag)) {
                    foreach($article["tags"] as $aTag) {
                        if(strtolower($aTag) == strtolower($tag)) {
                            $selection[] = $article ;
                        }
                    }
                } else {
                    $selection[] = $article ;
                }
            }
        }
    } else {
        $selection = $articles ;
    }
    
    return view('par', [
        'articles' => $selection
    ]);
})->where(['year' => '[0-9]+', 'tag' => '[a-zA-Z]+'])->name('par');


Route::get('/daily', 'Controller@dailyTraining')->name('daily');

Route::get('/exercices/{id?}', 'Controller@exercice')->where('id', '[0-9]+');
 * 
 */

/* Controllers thématiques */
Route::resource('programs', 'ProgramsController');

/* Pages généralistes */
Route::get('/', 'Controller@index')->name('index');

Route::get('/daily', 'Controller@daily')->name('daily');

Route::get('/exercices/{id?}', 'Controller@exercices')->name('exercices');

//Route::get('/login', 'Controller@login')->name('login');

Route::get('/signup', 'Controller@signup')->name('signup');

Route::get('/credits', 'Controller@credits')->name('credits');

Route::get('/legalinfos', 'Controller@legalinfos')->name('legalinfos');

/* Pages pour les membres connectés */

Route::get('/params', 'ConnectedController@params')->middleware('auth')->name('params');

Route::get('/stats', 'ConnectedController@stats')->middleware('auth')->name('stats');

Auth::routes();