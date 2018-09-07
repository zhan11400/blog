<?php
namespace app\admin\controller;
use app\admin\logic\GoodsLogic;
use app\admin\logic\SearchWordLogic;
use app\admin\logic\ArticleCatLogic;
use think\AjaxPage;
use think\Loader;
use think\Page;
use think\Db;

class Join extends Base {
    
    /**
     *  轮播列表
     */
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
        return $this->fetch('category');
	 }
	  public function aaa(){    
	  $cat = M('post_category')->where('is_open','1')->order('id desc')->select();
	    return  $cat;
	  }
	  public function recruit(){    
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
		$cat=$this->aaa();
        $count = $recruit->where($where)->count();// 查询满足要求的总记录数
        $pager = new Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
        $page = $pager->show();//分页显示输出  
		$this->assign('cat_id',$cat_id);
		$this->assign('cat',$cat);// 赋值数据集
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);// 赋值分页输出
        $this->assign('pager',$pager);
        return $this->fetch('recruit');
	 }
	    public function categoryHandle(){
			
        $data = I('post.');
		
        $url = $this->request->server('HTTP_REFERER');
        $referurl = !empty($url) ? $url : U('Admin/join/index');
        if($data['act'] == 'add'){
            $r = D('post_category')->add($data);
        }
       
        if($data['act'] == 'edit'){
            $r = M('post_category')->where('id', $data['id'])->save($data);
        }
        
        if($data['act'] == 'del'){
        	$r = D('post_category')->where('id', $data['id'])->delete();
        	if($r) exit(json_encode(1));       	
        }
        if($r){
            $this->success("操作成功",$referurl);
        }else{
            $this->error("操作失败",$referurl);
        }
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
    
	public function post(){
 		$act = I('get.act','add');
        $info = array();
        $info['publish_time'] = time()+3600*24;
        $id = I('get.id/d');
        if($id){
           $info = D('post_category')->where('id', $id)->find();
        }
        $this->assign('act',$act);
        $this->assign('info',$info);
        $this->initEditor();
        return $this->fetch();
    }
	public function article(){
 		$act = I('get.act','add');
        $info = array();
        $info['publish_time'] = time()+3600*24;
        $id = I('get.id/d');
        if($id){
           $info = D('recruit')->where('id', $id)->find();
        }
		$list = D('post_category')->where('is_open','1')->order('id desc')->select();
		$this->assign('list',$list);
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
        $referurl = !empty($url) ? $url : U('Admin/recruit/index');
        //$data['content'] = htmlspecialchars(stripslashes($_POST['content']));
        if($data['act'] == 'add'){
            $data['click'] = mt_rand(1000,1300);
        	$data['add_time'] = time(); 
            $r = D('recruit')->add($data);
        }
       
        if($data['act'] == 'edit'){
            $r = M('recruit')->where('id', $data['id'])->save($data);
        }
        
        if($data['recruit'] == 'del'){
        	$r = D('about')->where('id', $data['id'])->delete();
        	if($r) exit(json_encode(1));       	
        }
        if($r){
            $this->success("操作成功",$referurl);
        }else{
		
            $this->error("操作失败",$referurl);
        }
    }
  
}