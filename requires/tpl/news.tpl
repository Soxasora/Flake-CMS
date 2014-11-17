<?php
if(!isset($_GET['id']))
{
	$articleq = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT 1");
}
else
{
	$articleq = mysql_query("SELECT * FROM articles WHERE id = '".$_GET['id']."' LIMIT 1");
}
$article = mysql_fetch_array($articleq);
$authorq = mysql_query("SELECT * FROM characters WHERE id = '".$article['author']."' LIMIT 1");
$author = mysql_fetch_array($authorq);
$recentstoriesq = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT 25");
?>
<style type="text/css">
.charentry { 
width: 115%; 
background-color: #fff; 
border-radius: 4px; 
border: 2px solid #F2F2F2; 
margin-bottom: 5px; 
margin-left: -50px;
}
.charentry .inner { 
padding: 4px 10px 6px 10px; 
}
</style>
<div class="column1" id="column1">
<h3><?php TemplateManager::WriteLine($article["title"]); ?></h3>
<br />
<?php TemplateManager::WriteLine($article["longstory"]); ?>
<br />
-&nbsp;<b><?php TemplateManager::WriteLine($author["username"]); ?></b>
<br /><br />
</div>

<div class="column2" id="column2">
<div class="charentry">
<div class="inner">
<div class="left" style="width: 65%;">
<b>News List</b><br />
<?php
$query = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT 1;");
$num = mysql_num_rows($query);
if($num > 0)
{
?>
<div id="newsblock">

	<div id="newslist">
		<ul class="newslist-inner">
		<?php
		$query = mysql_query("SELECT * FROM articles ORDER BY id DESC LIMIT 25");
			while($news = mysql_fetch_assoc($query))
			{
				if($color == 'n')
				$color='alt';
				else
				$color='n';

				if($_GET['id'] == $news['id'])
				{
					TemplateManager::WriteLine('<li class="'.$color.'">
							<a><a href="http://'.SITE_DOMAIN.'/news.php?id='.$news['id'].'"><b>'.$news['title'].'</b></a><br />
							<small>'.@date("d/M/Y", $news['published']).'</small><br />
						</li>');
				}
				else
				{
					TemplateManager::WriteLine('<li class="'.$color.'">
							<a><a href="http://'.SITE_DOMAIN.'/news.php?id='.$news['id'].'">'.$news['title'].'</a><br />
							<small>'.@date("d/M/Y", $news['published']).'</small><br />
						</li>');
				}
			}
?>
		</ul>

	</div>

</div>
<?php
}
?>
</div>

<div class="clear">
</div>
</div>
