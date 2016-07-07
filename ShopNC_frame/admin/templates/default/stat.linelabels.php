<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div id="container_<?php echo $_REQUEST['stattype'];?>"></div>
<script>
$(function () {
	$('#container_<?php echo $_REQUEST['stattype'];?>').highcharts(<?php echo $output['stat_json'];?>);
});
</script>