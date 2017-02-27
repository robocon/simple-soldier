<div style="position: relative;">
    <img src="<?=getUrl();?>assets/images/mapthailand01.png" class="img-responsive">
    <?php
    foreach ($items as $key => $item) {
        $position = $item['position'];
        ?>
        <div style="position: absolute;top: <?=$position['top'];?>%;left: <?=$position['left'];?>%;">
            <span class="badge" title="<?=$item['name'];?>"><?=$item['rows'];?></span>
        </div>
        <?php
    }
    ?>
</div>