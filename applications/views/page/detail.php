<div class="container">
	<div class="col-sm-3">
		<div class="list-group">
			<?php 
			foreach ($menus as $key => $menu) {
				$active = ( $menu['id'] === $page_id ) ? 'active' : '' ;
				?>
					<a href="<?=getUrl();?>page/lists/<?=$depart_id;?>/<?=$menu['id'];?>" class="list-group-item <?=$active;?>"><?=$menu['title'];?></a>
				<?php
			}
			?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<h2><?=$item['title'];?></h2>
			<hr>
			<?=htmlspecialchars_decode($item['data'], ENT_QUOTES);?>
		</div>
	</div>
</div>
