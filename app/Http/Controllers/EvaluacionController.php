<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;

use GuzzleHttp\Client;

use DB;

use Carbon\Carbon;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('evaluacion.evaluacion');
    }



  

   public function crear_json(){

    $client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'https://jsonplaceholder.typicode.com',
    // You can set any number of default request options.
    'timeout'  => 5.0,
    ]);


$response = $client->request('GET', 'photos');

$photos = json_decode($response->getBody()->getContents());


    foreach ($photos as $photo) {
        # code...

        $id = $photo->id;
        $albumId = $photo->albumId;
        $title = $photo->title;
        $url = $photo->url;
        $thumbnailUrl = $photo->thumbnailUrl;


           DB::table('contactica')->insert([
            "id"                 => $id ,
            "albumId"   => $albumId,
            "title" => $title,
            "url"              => $url,
            "thumbnailUrl"            => $thumbnailUrl,
            // "created_at"             => Carbon::now(),
            // "updated_at"             => carbon::now(),
        ]);


    }




}

  
}