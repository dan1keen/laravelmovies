<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Laravel\Facades\Tmdb;
use Tmdb\Repository\MovieRepository;
class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(MovieRepository $movies)
    {
        $this->movies = $movies;
    }
    public function index()
    {
        $token  = new \Tmdb\ApiToken('bf4a7e22bb42072d024a9c1b6f88597f');
        $client = new \Tmdb\Client($token, [
            'cache' => [
                'path' => '/tmp/php-tmdb'
            ]
        ]);
        $repository = new \Tmdb\Repository\MovieRepository($client);
        $movie = $repository->getPopular();
        return view('welcome', compact('movie'));
    }
    public function detail($id)
    {
        $token  = new \Tmdb\ApiToken('bf4a7e22bb42072d024a9c1b6f88597f');
        $client = new \Tmdb\Client($token, [
            'cache' => [
                'path' => '/tmp/php-tmdb'
            ]
        ]);
        $repository = new \Tmdb\Repository\MovieRepository($client);
        $movie = $repository->load($id);
        $key = 'bf4a7e22bb42072d024a9c1b6f88597f';
        $url='https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key='.$key;
        $result = file_get_contents($url);
        $resultData = json_decode($result);

        return view('detail', compact('movie'), compact('resultData'));
    }
    public function cast($id)
    {

        $key = 'bf4a7e22bb42072d024a9c1b6f88597f';
        $url='https://api.themoviedb.org/3/movie/'.$id.'/credits?api_key='.$key;
        $result = file_get_contents($url);
        $resultData = json_decode($result);
        return view('cast', compact('resultData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
