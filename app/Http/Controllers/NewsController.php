<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rss;
use App\Models\News;

class NewsController extends Controller
{
    public function aggregrate($id_rss){
        // disini kita akan membuat logic untuk get rss data by id_rss
        $rss = Rss::findOrFail($id_rss);
        
        // kita akan parsing xml to object
        $xml = file_get_contents($rss->url);
        $xmlObj = simplexml_load_string($xml);
        // dd($xmlObj->channel);

        // save to table news
        foreach($xmlObj->channel->item as $xml){
            $title= $xml->title;
            $desc= $xml->description;
            $url= $xml->enclosure['url'];
            $data= array(
                'title' => $title,
                'img_url' => null,
                'description' => $desc,
                'source_url' => $url,
                'rss_id' => $id_rss
            );
            News::Create($data);
            // dd($data);
        }

        // get from news
        $news= News::where('rss_id', $id_rss)->get();
        foreach($news as $n){
            print_r($n->title ."<br>".$n->description);
            print_r("<br><br><br><br>");    
        }
    }
}
