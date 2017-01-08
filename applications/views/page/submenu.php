<ul>
	<?php 
	foreach ($items as $key => $item) {
		?>
		<li><a href="<?=getUrl();?>page/lists/<?=$depart_id;?>/<?=$item['id'];?>"><?=$item['title'];?></a></li>
		<?php
	}
	?>
</ul>