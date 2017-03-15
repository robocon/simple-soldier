<style type="text/css">
.container{
    width: 100%;
}
.badge{
    font-size: 8pt;
}
.badge-link{
    color: #ffffff;
}
img {
    width: 100%;
    height: auto;
}
</style>

<div style="position: relative;">
    <img src="<?=getUrl();?>assets/images/mapthailand01.png" alt="">
    <?php
    
    foreach ($items as $key => $item) {
        $position = $item['position'];
        ?>
        <div style="position: absolute;top: <?=$position['top'];?>%;left: <?=$position['left'];?>%;">
            <span class="badge" title="<?=$item['province'];?>">
                <a href="javascript:void(0);" class="badge-link" data-hos="<?=$item['province'];?>"><?=$item['rows'];?> ราย</a>
            </span>
        </div>
        <?php
    }
    
    ?>
</div>

<div style="display: none;">
    <form action="<?=getUrl();?>search" method="post" id="post_tohos">
        <input type="hidden" name="province" id="post_hosname" value="">
        <input type="hidden" name="year" value="<?=(date('Y'));?>">
        <input type="hidden" name="hos_id" value="all">
        
        <input type="hidden" name="token" value="<?=generate_token('search_patient');?>">
        <input type="hidden" name="action" value="start_search">
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '.badge-link', function(){
            var hos_id = $(this).attr('data-hos');
            $('#post_hosname').val(hos_id);
            $('#post_tohos').submit();
        });
    });
</script>