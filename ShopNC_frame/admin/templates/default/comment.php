<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>评论采集</h3>
      <ul class="tab-base">
        <li>天猫评论采集</li>
    
      </ul>
    </div>
  </div>


  

<div style="margin-top:50px">


<form id="form1" name="form1" method="post" action="index.php?act=comment_collect&op=comment_preview&goods_id=<?php echo $output['goods_id'];?>&goods_name=<?php echo $_GET['goods_name'];?>">
  <input type="hidden" name="goods_name" value="<?php echo $_GET['goods_name'];?>"/>
  <input type="hidden" name="goods_id" value="<?php echo $_GET['goods_id'];?>"/>
<table cellspacing="1" cellpadding="3" width="100%">

<tr>
<td class="label" style="width:20%">天猫商品URL：</td>
<td> <input type="text" name="taourl" id="taourl"   size="50" value=""/>例如：http://item.tmall.com/item.htm?id=10682890468</td>
</tr>

<tr>
<td class="label" style="width:20%">商品关键词过滤：</td>
<td><input type="text" name="keyword" id="keyword"   size="30" value=""/>
  例如：很好,将评论当中带有'很好'这个字符串的评论提取出来</td>
</tr>


<tr>
<td class="label" style="width:20%">系统读取天猫的页数</td>
<td><input type="text" name="GetNum" id="GetNum" value="3">
  提示：数值越大读取越慢，数值必须大于1</td>
</tr>


<tr>
<td class="label" style="width:20%">生成评论的数量</td>
<td><input type="text" name="maxNum" id="maxNum" value="10"></td>
</tr>

<tr>
<td class="label" style="width:20%">购买记录时间和评价时间之差</td>
<td><input type="text" name="TimeSplit" id="TimeSplit" value="172800">
  *[以秒为单位，默认值为172800 = 2天]</td>
</tr>



<tr align="center">
<td colspan="2"><input type="submit" name="button" class="button" id="button" value="确定"></td>
</tr>
</table>
</form>

</div>
