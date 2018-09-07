<?php
namespace app\admin\controller;
use app\admin\logic\GoodsLogic;
use app\admin\logic\SearchWordLogic;
use app\admin\logic\ArticleCatLogic;
use think\AjaxPage;
use think\Loader;
use think\Page;
use think\Db;

class Family extends Base {
    
    /**
     *  轮播列表
     */
	 public function index(){    
       $Article =  M('family'); 
        $list = array();
        $p = input('p/d', 1);
        $size = input('size/d', 20);
        $where = array();
        $keywords = trim(I('keywords'));
        $keywords && $where['title'] = array('like', '%' . $keywords . '%');
        $cat_id = I('cat_id/d',0);
        $cat_id && $where['cat_id'] = $cat_id;
        $res = $Article->where($where)->order('article_id desc')->page("$p,$size")->select();
        $count = $Article->where($where)->count();// 查询满足要求的总记录数
        $pager = new Page($count,$size);// 实例化分页类 传入总记录数和每页显示的记录数
        $page = $pager->show();//分页显示输出
        $this->assign('cats',$cats);
        $this->assign('cat_id',$cat_id);
        $this->assign('list',$res);// 赋值数据集
        $this->assign('page',$page);// 赋值分页输出
        $this->assign('pager',$pager);
        return $this->fetch('articleList');
	 }
	    public function aticleHandle(){
        $data = I('post.');
        $data['content'] = I('content'); // 文章内容单独过滤
		$data['goods_images']=array_filter($data['goods_images']);
for($i=0;$i<count($data['goods_images']);$i++){
	 $c[]=array('goods_images'=>$data['goods_images'][$i],'goods_images_title'=>$data['goods_images_title'][$i]);
	// $c['g'][]=$b[$i];
}
		$data['images'] = json_encode($c);
        $data['publish_time'] = strtotime($data['publish_time']);
        $url = $this->request->server('HTTP_REFERER');
        $referurl = !empty($url) ? $url : U('Admin/family/index');
        //$data['content'] = htmlspecialchars(stripslashes($_POST['content']));
        if($data['act'] == 'add'){
            $data['click'] = mt_rand(1000,1300);
        	$data['add_time'] = time(); 
            $r = D('family')->add($data);
        }
       
        if($data['act'] == 'edit'){
            $r = M('family')->where('article_id', $data['article_id'])->save($data);
        }
        
        if($data['act'] == 'del'){
        	$r = D('family')->where('article_id', $data['article_id'])->delete();
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
    
	    public function article(){
 		$act = I('get.act','add');
        $info = array();
        $info['publish_time'] = time()+3600*24;
        $article_id = I('get.article_id/d');
        if($article_id){
           $info = D('family')->where('article_id', $article_id)->find();
		   $goodsImages=json_decode($info['images'],true);
        }
			// foreach($goodsImages as $a){
				// echo $a['goods_images'];
				// echo '<br>';
			// }
			// exit;
		$this->assign('goodsImages',$goodsImages);
        $this->assign('act',$act);
        $this->assign('info',$info);
        $this->initEditor();
        return $this->fetch();
    }
  
}