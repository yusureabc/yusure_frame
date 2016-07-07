<?php defined('IN_B2B2C') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['nc_mobile_content'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=mb_cn&op=mb_cn_list" class="current"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="index.php?act=mb_cn&op=mb_cn_add" ><span><?php echo $lang['nc_new'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li><?php echo $lang['mb_cn_content'];?></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
    <table class="table tb-type2 nobdb">
      <thead>
        <tr class="thead">
          <th>&nbsp;</th>
          <th><?php echo $lang['nc_sort'];?></th>  
          <th><?php echo $lang['home_index_navtitle'];?></th>
          <th><?php echo $lang['link_index_title'];?></th>
          <th><?php echo $lang['mb_cl_content'];?></th>
          <th><?php echo $lang['link_index_pic_sign'];?></th>
          <th><?php echo $lang['nc_mobile_openmethods'];?></th>
          <th><?php echo $lang['nc_mobile_openname'];?></th>
          <th><?php echo $lang['mb_cl_cation'];?></th>
          <th><?php echo $lang['mb_cn_homepage'] ;?></th>
         
          <th class="align-center"><?php echo $lang['nc_handle'];?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          // var_dump( $output['cn_list'] );exit;
        ?>

        <?php if(!empty($output['cn_list']) && is_array($output['cn_list'])){ ?>

        <?php foreach($output['cn_list'] as $k => $v){ ?>
        <tr class="hover edit">
          <td class="w24"></td>
          <td class="w48 sort"><span class="tooltip editable" title="<?php echo $lang['nc_editable'];?>" ajax_branch='link_sort' datatype="number" fieldid="<?php echo $v['cn_sort'];?>" fieldname="link_sort" nc_type="inline_edit"><?php echo $v['cn_sort'];?></span></td>
          <td><?php echo $v['cn_navtitle'];?></td>    <!-- 导航标题 -->
          <td><?php echo $v['cn_clicktitle'];?></td>  <!-- 点击标题 -->
          <td><?php echo $v['cn_content'];?></td>     <!-- 标题上面内容 -->
          <td class="picture">      <!-- 图片 -->
            <?php 
    				if($v['cn_pic'] != '')
            {
    					echo "<div class='size-88x31'><span class='thumb size-88x31'><i></i><img width=\"88\" height=\"31\" src='".$v['cn_pic_url']."' onload='javascript:DrawImage(this,88,31);' /></span></div>";
    				}
				    ?>
          </td>
          <td>    <!-- 访问方式 -->
            <?php 
              switch ( $v['cn_openmethods'] )
              {
                  case '1':
                  echo '商铺';
                  break;

                  case '2':
                  echo '商品';
                  break;

                  case '3':
                  echo '分类';
                  break;

                  case '4':
                  echo '关键词';
                  break;

                  case '5':
                  echo '网址';
                  break;

                  default:
                  echo '访问方式不存在！';
                  break;
              }
             ?>
          </td>
          <!-- 访问内容 -->
          <td> <?php echo $v['cn_openurl']; ?> </td>
          <!-- 套餐所属分类 -->
          <td>
            <?php
              switch ( $v['cn_genus'] ) 
              {
                case '1':
                  echo '高铁o2o';
                  break;
                
                case '2':
                echo '社区o2o';
                break;

                case '3':
                echo '商业o2o';
                break;

                default:
                  echo '更多';
                  break;
              }
            ?>
          </td>
          <td class="w96 align-center">
            <?php
              switch ( $v['cn_homepage'] ) 
              {
                case '1':
                  echo '是';
                  break;
                
                default:
                  echo '否';
                  break;
              }
            ?>
          </td>
          <td class="w96 align-center"><a href="index.php?act=mb_cn&op=mb_cn_edit&cn_id=<?php echo $v['cn_id'];?>"><?php echo $lang['nc_edit'];?></a> | <a href="javascript:if(confirm('<?php echo $lang['nc_ensure_del'];?>'))window.location = 'index.php?act=mb_cn&op=mb_cn_del&cn_id=<?php echo $v['cn_id'];?>';"><?php echo $lang['nc_del'];?></a></td>
        </tr>
        <?php } ?>
        <?php }else { ?>
        <tr class="no_data">
          <td colspan="10"><?php echo $lang['nc_no_record'];?></td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <?php if(!empty($output['cl_list']) && is_array($output['cl_list'])){ ?>
        <tr class="tfoot" id="dataFuncs">
          <td></td>
          <td colspan="16" id="batchAction">
            <div class="pagination"> <?php echo $output['page'];?> </div></td>
        </tr>
      </tfoot>
      <?php } ?>
    </table>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.edit.js" charset="utf-8"></script>
