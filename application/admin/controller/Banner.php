<?php
namespace app\admin\controller;
use app\admin\logic\GoodsLogic;
use app\admin\logic\SearchWordLogic;
use app\admin\logic\ArticleCatLogic;
use think\AjaxPage;
use think\Loader;
use think\Page;
use think\Db;

class Banner extends Base {
    
    /**
     *  轮播列表
     */
	 public function banner(){    
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Ad =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =0;
        $count = $Ad->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	 public function share(){    
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Ad =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =1;
        $count = $Ad->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	  public function event(){    
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Ad =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =2;
        $count = $Ad->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	  public function family(){    
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Ad =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =3;
        $count = $Ad->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	  public function activity(){    
        delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览  
        $Ad =  M('banner');         
        $keywords = I('keywords/s',false,'trim');
        if($keywords){
            $where['ad_name'] = array('like','%'.$keywords.'%');
        }
		$where['pid'] =4;
        $count = $Ad->where($where)->count();// 查询满足要求的总记录数
        $Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	 public function logo(){
	 	delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览
	 	$Ad =  M('banner');
	 	$keywords = I('keywords/s',false,'trim');
	 	if($keywords){
	 		$where['ad_name'] = array('like','%'.$keywords.'%');
	 	}
	 	$where['pid'] =5;
	 	$count = $Ad->where($where)->count();// 查询满足要求的总记录数
	 	$Page = $pager = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
	 	$res = $Ad->where($where)->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
	 public function ad(){
	 	$act = I('get.act','add');
	 	$ad_id = I('get.ad_id/d');
	 	$ad_info = array();
	 	if($ad_id){
	 		$ad_info = D('banner')->where('ad_id',$ad_id)->find();
	 		$ad_info['start_time'] = date('Y-m-d',$ad_info['start_time']);
	 		$ad_info['end_time'] = date('Y-m-d',$ad_info['end_time']);
	 	}
	 	if($act == 'add')
	 		$ad_info['pid'] = $this->request->param('pid');
	 	$position = D('ad_position')->select();
	 	$this->assign('info',$ad_info);
	 	$this->assign('act',$act);
	 	$this->assign('position',$position);
	 	return $this->fetch();
	 }
	 public function adHandle(){
	 	$data = I('post.'); 
	 	if($data['act'] == 'add'){
	 		$r = D('banner')->add($data);
	 	}
	 	if($data['act'] == 'edit'){
	 		$r = D('banner')->where('ad_id', $data['ad_id'])->save($data);
	 	}
	 	 
	 	if($data['act'] == 'del'){
	 		$r = D('banner')->where('ad_id', $data['ad_id'])->delete();
	 		if($r) exit(json_encode(1));
	 	}
	 	$referurl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : U('Admin/Banner/banner');
	 	// 不管是添加还是修改广告 都清除一下缓存
	 	delFile(RUNTIME_PATH.'html'); // 先清除缓存, 否则不好预览
	 	\think\Cache::clear();
	 	if($r){
	 		$this->success("操作成功",$referurl);
	 	}else{
	 		$this->error("操作失败",$referurl);
	 	}
	 }
  
}