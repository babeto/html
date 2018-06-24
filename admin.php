
    <?php
		include('./articles.php');
		$articles = new articles();
		$e=25;
		while ($e>0) {
			$articles->insertArticle();
			$e--;
		}
		
	?>
