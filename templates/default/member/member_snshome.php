<?php defined('InShopNC') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.ajaxContent.pack.js" ></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/sns.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.charCount.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<div class="wrap">
  <?php include template('member'.DS.$output['tpl_name']);?>
</div>
<script type="text/javascript">
var max_recordnum = '<?php echo $output['max_recordnum'];?>';
</script>
