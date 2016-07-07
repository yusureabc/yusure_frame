<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready( function() {
  $("td[name='joke_con']").hover( 
    function() {
      // 显示
      var joke_id = $(this).attr( 'id' );
      var checkd_joke = "#con" + joke_id;
      $( checkd_joke ).show();
    }, 
    function() {
      // 隐藏
      var joke_id = $(this).attr( 'id' );
      var checkd_joke = "#con" + joke_id;
      $( checkd_joke ).hide();
  });

});
 
function submit_red(id){
    if(confirm('<?php echo $lang['nc_joke_red'];?>')) {
        $('#list_form').attr('method','post');
        $('#list_form').attr('action','index.php?act=shake_joke&op=joke_red');
        $('#joke_id').val(id);
        $('#list_form').submit();
    }
}

</script>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['shake_joke_list'];?></h3>
      <ul class="tab-base">

        <?php   foreach($output['menu'] as $menu) {  if($menu['menu_type'] == 'text') { ?>
        <li><a href="<?php echo $menu['menu_url'];?>" class="current"><span><?php echo $menu['menu_name'];?></span></a></li>
        <?php }  else { ?>
        <li><a href="<?php echo $menu['menu_url'];?>" ><span><?php echo $menu['menu_name'];?></span></a></li>
        <?php  } }  ?>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <!-- 操作说明 -->
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12" class="nobg"> <div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span> </div>
        </th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['shake_joke_prompt'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <form id="list_form" method='post'>
    <input id="joke_id" name="joke_id" type="hidden" />
    <table class="table tb-type2">
      <thead>

        <tr class="thead">
          <th></th>
          <th class="align-left"><?php echo $lang['shake_joke_id'];?></th>
          <th class="align-left"><?php echo $lang['shake_joke_abbreviations'];?></th>
          <th class="align-left"><?php echo $lang['shake_joke_release_time'];?></th>
          <th class="align-left"><?php echo $lang['shake_joke_edit_time'];?></th>
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($output['joke_list']) && is_array($output['joke_list'])){ ?>
        <?php foreach($output['joke_list'] as $val){ ?>
        <tr class="hover edit">
          <td></td>
          <td> <?php echo $val['joke_id'];?> </td>
          <td id="<?php echo $val['joke_id']; ?>" name="joke_con" > <?php echo mb_substr( $val['joke_contents'], 0, 20, 'utf-8') . "……";?> </td>
          <!-- 隐藏内容 -->
          <div id="<?php echo 'con'.$val['joke_id']; ?>" style="display: none"> 
            <textarea  rows="5" cols="45"><?php echo $val['joke_contents']; ?></textarea>
          </div>
          <td> <?php echo date("Y-m-d H:i:s", $val['release_time']); ?> </td>
          <td> <?php echo date("Y-m-d H:i:s", $val['edit_time']); ?> </td>
          <td class="w72 align-center">
            <a href="javascript:submit_red(<?php echo $val['joke_id'];?>)"><?php echo $lang['nc_red'];?></a>
          </td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td colspan="16" id="batchAction">
              <div class="pagination"> <?php echo $output['page'];?> </div>
            </td>
        </tr>
      </tbody> 
    </table>
  </form>
</div>
