<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Twitter;

class TwitterApiController extends Controller{
    
    public function twitterUserTimeLine(){
		$twits = Twitter::getUserTimeline(['screen_name' => 'PVtranslations', 'count' => 2, 'format' => 'object']);
		echo "<div class='twitter'><ul>";
		foreach ($twits as $twit) {
			if(isset($twit->entities->urls[0]->url)){
				$url = $twit->entities->urls[0]->url;
				echo "<li> <a href=".$url."> ". $twit->text. "  </a></li>";}

			if(isset($twit->entities->media[0]->url)){
				$url = $twit->entities->media[0]->url;
				echo "<li> <a href=".$url."> ". $twit->text. "  </a></li>";}

			if(!isset($twit->entities->urls[0]->url) && !isset($twit->entities->media[0]->url))			
				echo "<li>". $twit->text. "  </li>";
		}
		echo "</ul></div>";

	}
}
