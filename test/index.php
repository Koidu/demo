<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My site</title>
</head>
<body>

	<?php
	 	echo "<link rel='stylesheet' type='text/css' href='style.css' />";

		$html = "";
		$url = "https://flipboard.com/@raimoseero/feed-nii8kd0sz?rss";
		$xml = simplexml_load_file($url);

		$html .= "<div class='container'>";
		for ($i = 0; $i < 18; $i++) {
			$title = $xml->channel->item[$i]->title;
			$description = $xml->channel->item[$i]->description;
			$image = $xml->channel->item[$i]->children('media', True)->content->attributes();
			$link = $xml->channel->item[$i]->link;
			$author = $xml->channel->item[$i]->author;
			$category = $xml->channel->item[$i]->category;

			$html .= "<div class='item'>";
			$html .= "<p class='category'>$category</p>" ;
			$html .= "<img src='$image' alt='$title'>";
			$html .= "<h3>$title</h3>";	
			$html .= "<p>$description</p>" ;
			$html .= "<p class='author'>$author</p>" ;		
			$html .= "</div>";
		}
		$html .= "</div>";
		echo $html;


	   	echo "<script type='text/javascript' src='app.js'></script>";
	?>
	

</body>
</html>




