
<?php

/*
  Plugin Name: Times of india news
  Description: A simple plugin which give you all letest News from Times of india. Just paste the shortcode [TOI_news] where you want to show the news feeds
  Version: 1.0
  Author: Ranit Majumder
  Author URI: http://www.facebook.com/ranit.majumder
  License: GPL2
*/
add_shortcode('TOI_news','toi_newses');
function toi_newses()
{
$content = file_get_contents("https://newsapi.org/v1/articles?source=the-times-of-india&sortBy=latest&apiKey=0c44b5af560d437caee4315476fb29f6");
$result  = json_decode($content);
$articles_array = $result->articles;	
foreach ($articles_array as $value) { ?>
	<div>
		<a href="<?php echo $value->url ?>" style="display: block;">
			<div style="display: inline-block; width: 50px">
				<img width="50px" src="<?php echo $value->urlToImage ?>" alt="">
			</div>	
			<div style="display: inline-block; width:90%; font-size:14px; line-height:10px;padding-left: 10px;">
				
				<?php echo $value->title ?>
			</div>				
		</a>
	</div>
<?php
}
}
?>

