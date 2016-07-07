<?php
/**
 * 检测版本更新接口
 */
defined('IN_B2B2C') or exit('Access Invalid!');
class updateControl extends mobileHomeControl{

	public function __construct() {
        parent::__construct();
    }
    public function indexOp(){
    	$apkname = $_GET['apkname'];
             $iosapkname=$_GET['iosapkname'];
    	$app_home=array('versionCode' => '12','versionName' => '2.12','downloadUrl'=>SHOP_SITE_URL."/download/".$apkname.".apk",'apkName'=>$apkname.'.apk');
            $iosapp_home=array('versionCode' => '9','versionName' => '9.0','downloadUrl'=>SHOP_SITE_URL."/download/".$iosapkname.".zip",'apkName'=>$iosapkname.'.zip');	
            $datas['downloadInfo'] = $app_home;
            $datas['iosdownloadInfo']=$iosapp_home;
            output_data($datas);
    }
}
