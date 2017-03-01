<style type="text/css">
.badge-link{
    color: #ffffff;
}
</style>
<div style="position: relative;">
    <img src="<?=getUrl();?>assets/images/mapthailand01.png" class="img-responsive">
    <?php
    foreach ($items as $key => $item) {
        $position = $item['position'];
        ?>
        <div style="position: absolute;top: <?=$position['top'];?>%;left: <?=$position['left'];?>%;">
            <span class="badge" title="<?=$item['name'];?>">
                <a href="javascript:void(0);" class="badge-link" data-hos="<?=$item['hos_id'];?>"><?=$item['rows'];?> ราย</a>
            </span>
        </div>
        <?php
    }
    ?>
</div>
<div style="display: none;">
    <form action="<?=getUrl();?>search" method="post" id="post_tohos">
        <input type="hidden" name="hos_id" id="post_hosid" value="">
        <input type="hidden" name="year" value="<?=(date('Y'));?>">
        <input type="hidden" name="token" value="<?=generate_token('search_patient');?>">
        <input type="hidden" name="action" value="start_search">
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '.badge-link', function(){
            var hos_id = $(this).attr('data-hos');
            $('#post_hosid').val(hos_id);
            $('#post_tohos').submit();
        });
    });
</script>