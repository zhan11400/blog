<?php
namespace app\admin\controller; 
use think\AjaxPage;
use think\Controller;
use think\Url;
use think\Config;
use think\Page;
use think\Verify;
use think\Db;
class Index extends Base {

    public function index(){
    	$act_list = session('act_list');
    	
        $this->pushVersion();    
	
        $act_list = session('act_list');
        $menu_list = getMenuList($act_list);         
        $this->assign('menu_list',$menu_list);
        $admin_info = getAdminInfo(session('admin_id'));
        $this->assign('admin_info',$admin_info);   	
        $this->assign('menu',getMenuArr());   
		
        return $this->fetch();
    }
    public function welcome(){
    	$this->assign('sys_info',$this->get_sys_info());
//    	$today = strtotime("-1 day");
    	$today = strtotime(date("Y-m-d"));
  
    	$this->assign('count',$count);
        return $this->fetch();
    }
    
    public function get_sys_info(){
		$sys_info['os']             = PHP_OS;
		$sys_info['zlib']           = function_exists('gzclose') ? 'YES' : 'NO';//zlib
		$sys_info['safe_mode']      = (boolean) ini_get('safe_mode') ? 'YES' : 'NO';//safe_mode = Off		
		$sys_info['timezone']       = function_exists("date_default_timezone_get") ? date_default_timezone_get() : "no_timezone";
		$sys_info['curl']			= function_exists('curl_init') ? 'YES' : 'NO';	
		$sys_info['web_server']     = $_SERVER['SERVER_SOFTWARE'];
		$sys_info['phpv']           = phpversion();
		$sys_info['ip'] 			= GetHostByName($_SERVER['SERVER_NAME']);
		$sys_info['fileupload']     = @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';
		$sys_info['max_ex_time'] 	= @ini_get("max_execution_time").'s'; //脚本最大执行时间
		$sys_info['set_time_limit'] = function_exists("set_time_limit") ? true : false;
		$sys_info['domain'] 		= $_SERVER['HTTP_HOST'];
		$sys_info['memory_limit']   = ini_get('memory_limit');	                                
        $sys_info['version']   	    = file_get_contents(APP_PATH.'admin/conf/version.php');
		$mysqlinfo = Db::query("SELECT VERSION() as version");
		$sys_info['mysql_version']  = $mysqlinfo[0]['version'];
		if(function_exists("gd_info")){
			$gd = gd_info();
			$sys_info['gdinfo'] 	= $gd['GD Version'];
		}else {
			$sys_info['gdinfo'] 	= "未知";
		}
		$sys_info['development']             ='湛工';
		$sys_info['website']             ='http://www.zhan666.cn';
		$sys_info['bbs']             ='http://blog.zhan666.cn';
		$sys_info['update']             ='2017-6-29';
		return $sys_info;
    }
    
    // 在线升级系统
    public function pushVersion()
    {            
        if(!empty($_SESSION['isset_push']))
            return false;    
        $_SESSION['isset_push'] = 1;    
        error_reporting(0);//关闭所有错误报告
        $app_path = dirname($_SERVER['SCRIPT_FILENAME']).'/';
        $version_txt_path = $app_path.'/application/admin/conf/version.php';
        $curent_version = file_get_contents($version_txt_path);

        $vaules = array(            
                'domain'=>$_SERVER['SERVER_NAME'], 
                'last_domain'=>$_SERVER['SERVER_NAME'], 
                'key_num'=>$curent_version, 
                'install_time'=>INSTALL_DATE,
                'serial_number'=>SERIALNUMBER,
         );     
         $url = "http://service.tp-shop.cn/index.php?m=Home&c=Index&a=user_push&".http_build_query($vaules);
         stream_context_set_default(array('http' => array('timeout' => 3)));
         file_get_contents($url);         
    }
    
    /**
     * ajax 修改指定表数据字段  一般修改状态 比如 是否推荐 是否开启 等 图标切换的
     * table,id_name,id_value,field,value
     */
    public function changeTableVal(){  
            $table = I('table'); // 表名
            $id_name = I('id_name'); // 表主键id名
            $id_value = I('id_value'); // 表主键id值
            $field  = I('field'); // 修改哪个字段
            $value  = I('value'); // 修改字段值                        
            M($table)->where("$id_name = $id_value")->save(array($field=>$value)); // 根据条件保存修改的数据
    }	 

	 public function banner(){ 
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Db =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =0;
        $count = $Db->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Db->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list = array();
        if($res){
        	$media = array('图片','文字','flash');
        	foreach ($res as $val){
        		$val['media_type'] = $media[$val['media_type']];        		
        		$list[] = $val;
        	}
        }                           
        $show = $Page->show();// 分页显示输出
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		$this->assign('keywords',$keywords);      
        $this->assign('pager',$pager);        
        return $this->fetch();
	 }	
	 public function category(){    
       $Article =  M('post_category'); 
        $list = array();
        $p = input('p/d', 1);
        $size = input('size/d', 20);
        $where = array();
        $keywords = trim(I('keywords'));
        $keywords && $where['name'] = array('like', '%' . $keywords . '%');
        $list = $Article->where($where)->order('id desc')->page("$p,$size")->select();
        $count = $Article->where($where)->count();// 查询满足要求的总记录数
        $pager = new Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
        $page = $pager->show();//分页显示输出  
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);// 赋值分页输出
        $this->assign('pager',$pager);
        return $this->fetch();
	 }
	  public function label(){    
       $Article =  M('label'); 
        $list = array();
        $p = input('p/d', 1);
        $size = input('size/d', 20);
        $where = array();
        $keywords = trim(I('keywords'));
        $keywords && $where['title'] = array('like', '%' . $keywords . '%');
        $list = $Article->where($where)->order('id desc')->page("$p,$size")->select();
        $count = $Article->where($where)->count();// 查询满足要求的总记录数
        $pager = new Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
        $page = $pager->show();//分页显示输出  
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);// 赋值分页输出
        $this->assign('pager',$pager);
        return $this->fetch();
	 }
	   public function articlelist(){  
       $recruit =  M('recruit'); 
        $list = array();
        $p = input('p/d', 1);
		$where = array();
        $size = input('size/d', 20);
        $keywords = trim(I('keywords'));
        $keywords && $dddd['title'] = array('like', '%' . $keywords . '%');
		$cat_id = I('cat_id/d',0);
        $cat_id && $dddd['cat_id'] = $cat_id;

        $list = $recruit->where($dddd)->order('id desc')->page("$p,$size")->select();
		foreach($list as &$row){
			$row['add_time']=date('Y-m-d H:i',$row['add_time']);
		}
		unset($row);

        $count = $recruit->where($where)->count();// 查询满足要求的总记录数
        $pager = new Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
        $page = $pager->show();//分页显示输出  
		$this->assign('cat_id',$cat_id);
		$this->assign('cat',$cat);// 赋值数据集
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);// 赋值分页输出
        $this->assign('pager',$pager);
        return $this->fetch();
	 }
	    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article')));
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article')));
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article')));
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article')));
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article')));
        $this->assign("URL_Home", "");
    }
	 	public function postlabel(){
 		$act = I('get.act','add');
        $info = array();
        $id = I('get.id/d');
        if($id){
           $info = D('label')->where('id', $id)->find();
        }
		
        $this->assign('act',$act);
        $this->assign('info',$info);
        $this->initEditor();
        return $this->fetch();
    }
	 public function labelHandle(){
			
        $data = I('post.');
		
        $url = $this->request->server('HTTP_REFERER');
        $referurl = !empty($url) ? $url : U('Admin/index/label');
        if($data['act'] == 'add'){
            $r = D('label')->add($data);
        }
       
        if($data['act'] == 'edit'){
            $r = M('label')->where('id', $data['id'])->save($data);
        }
        
        if($data['act'] == 'del'){
        	$r = D('label')->where('id', $data['id'])->delete();
        	if($r) exit(json_encode(1));       	
        }
        if($r){
            $this->success("操作成功",$referurl);
        }else{
		
            $this->error("操作失败",$referurl);
        }
    }
		public function article(){
 		$act = I('get.act','add');
        $info = array();
        $info['publish_time'] = time()+3600*24;
        $id = I('get.id/d');
        if($id){
           $info = D('recruit')->where('id', $id)->find();
		  
		   $info['label']=json_decode($info['label'],true);
		 
        }
		 if(empty($info['label'])){
			   $info['label']=array();
		  }
		
		$list = D('post_category')->where('is_open','1')->order('id desc')->select();
		$label = D('label')->where('is_open','1')->order('id desc')->select();
		$this->assign('list',$list);
		$this->assign('label',$label);
        $this->assign('act',$act);
        $this->assign('info',$info);
        $this->initEditor();
        return $this->fetch();
    }
		 public function aticleHandle(){
			
        $data = I('post.');
        $data['content'] = I('content'); // 文章内容单独过滤
        $data['publish_time'] = strtotime($data['publish_time']);
        $url = $this->request->server('HTTP_REFERER');
        $referurl = !empty($url) ? $url : U('Admin/index/index');
		$data['label']=json_encode($data['label']);
        //$data['content'] = htmlspecialchars(stripslashes($_POST['content']));
        if($data['act'] == 'add'){
        	$data['add_time'] = time(); 
            $r = D('recruit')->add($data);
        }
       
        if($data['act'] == 'edit'){
            $r = M('recruit')->where('id', $data['id'])->save($data);
        }
        
        if($data['act'] == 'del'){
        	$r = D('about')->where('id', $data['id'])->delete();
        	if($r) exit(json_encode(1));       	
        }
        if($r){
            $this->success("操作成功",$referurl);
        }else{
		  var_dump($data);
           // $this->error("操作失败",$referurl);
        }
    }
}