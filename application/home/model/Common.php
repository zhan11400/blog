<?php

namespace app\home\model;
use think\Model;
use think\DB;
use think\Request;
class Common extends Model {
	
  public function category(){
	  $category = M('post_category')->where('is_open',1)->select();    
	  return $category;
  }
   public function friendlink(){
	  $category = M('friend_link')->where('is_show',1)->select();    
	  return $category;
  }
}
