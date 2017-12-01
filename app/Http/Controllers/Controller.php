<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;
use \Statickidz\GoogleTranslate;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function postTranslate(Request $req){
    //   $link = $req->linksanpham;
    //   $ten = "haha";
    //   $data = ["ten"=> $ten, "link"=> $link];

    //   //  Create a new Goutte client instance
    //   $client = new Client();

    //   //  Hackery to allow HTTPS
    //   $guzzleclient = new \GuzzleHttp\Client([
    //       'timeout' => 60,
    //       'verify' => false,
    //   ]);

    //   // Create DOM from URL or file
    //   $html = file_get_html('https://www.facebook.com');

    //   // Find all images
    //   foreach ($html->find('img') as $element) {
    //       echo $element->src . '<br>';
    //   }

    //   // Find all links
    //   foreach ($html->find('a') as $element) {
    //       echo $element->href . '<br>';
    //   }

    //   return redirect()->route('translate')->with($data);
    //   // return redirect()->action('Controller@getTranslate',['link'=>$linksanpham]);
    // }
    public function postTranslate(Request $req){
      $text = $req->text;
      Log::info('Showing user profile for user: '.$req->text);
      $source = 'vi';
      $target = 'zh-CN';
      $trans = new GoogleTranslate();
      $result = $trans->translate($source, $target, $text);
      Log::info('Result: '.$result);
      return $result;
    }
}