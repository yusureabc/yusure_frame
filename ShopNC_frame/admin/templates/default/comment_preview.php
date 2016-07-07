

<form method="POST" action="index.php?act=comment_collect&op=comment_batch_import" name="listForm" onsubmit="return confirm_bath()">
<input type="hidden" name="goods_name" value="<?php echo $output['goods_name'];?>"/>
<input type="hidden" name="goods_id" value="<?php echo $output['goods_id'];?>"/>
<!-- 评论列表 开始 -->
<div class="list-div" id="listDiv">


<table cellpadding="3" cellspacing="1">
<tr>
<th><input  class="checkall" id="checkallBottom"  type="checkbox">编号</th>
<th>用户名</th>
<th>评论内容</th>
<th>评论时间</th>
<th>评分等级</th>
<th>显示/隐藏</th>
</tr>
 <?php if(!empty($output['comment_list']) && is_array($output['comment_list'])){ ?>
        <?php foreach($output['comment_list'] as $k => $v){?>

<tr>
<td><input value="<?php echo $v['id'];?>" name="checkboxes[]" type="checkbox" checked="checked"><?php echo $v['id'];?></td>

<td><input type='text' name='user_name[]' size='20' value="<?php  if($v['user_name'])  echo $v['user_name'];?>
" /></td>
<td><input type='text' name='content[]' size='50' value="<?php echo $v['content'];?>" /></td>
<td align="center"><input type='text' name='add_time[]' size='20' value="<?php echo $v['format_time'];?>" /></td>
<td align="center"><input type='text' name='comment_rank[]' size='3' value="<?php echo $v['comment_rank'];?>" /></td>
<td align="center"><input value="1" name="is_show[]" type="checkbox" checked="checked"></td>
</tr>

<?php }}else { ?>
<tr><td class="no-records" colspan="10">没有记录</td></tr>
<?php };?>
</table>


<table cellpadding="4" cellspacing="0">
<tr>
	<th colspan="4"><strong>生成订单信息项设置（为保证真实性，请把评论随机隐藏掉几个,并且把评论的日期改到不同时间段）</strong></th>
</tr>
<tr>
<td>购买数量设置</td><td><input type='text' name='buy_num' size='20' value="4" />
（默认为4，表示数量随机1-4件，可更改）</td>
<td>购买时间设置</td><td><input type='text' name='buy_time' size='20' value="5" />（默认为5，表示订单购买时间在评论时间前5天，可更改）<input type='hidden' name='goods_id' size='20' value="<?php echo $output['goods_id'];?>" />
</td>
</tr>
</table>


<table cellpadding="4" cellspacing="0">
<tr>
<td><input type="submit"  id="btnSubmit" value="批量导入" class="button"  />
</td>
</tr>
</table>

</div>
<!-- 评论列表 结束 -->
</form>

<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_PATH;?>/js/common_select.js" charset="utf-8"></script>
<script type="text/javascript" language="JavaScript">
function confirm_bath()
{
return confirm("确定将所选评论导入数据库？");
}
</script>

