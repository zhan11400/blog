<?php
return	array(	
	'system'=>array('name'=>'系统','child'=>array(
				array('name' => '设置','child' => array(
						array('name'=>'系统设置','act'=>'index','op'=>'System'),
						array('name'=>'自定义导航栏','act'=>'navigationList','op'=>'System'),
						array('name'=>'友情链接','act'=>'linkList','op'=>'Article'),
						array('name'=>'清除缓存','act'=>'cleanCache','op'=>'System'),
				)),
				array('name' => '权限','child'=>array(
						array('name' => '管理员列表', 'act'=>'index', 'op'=>'Admin'),
						array('name' => '角色管理', 'act'=>'role', 'op'=>'Admin'),
						array('name'=>'权限资源列表','act'=>'right_list','op'=>'System'),
						array('name' => '管理员日志', 'act'=>'log', 'op'=>'Admin'),
				)),
			
				array('name' => '模板','child'=>array(
						array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
				)),
				array('name' => '数据','child'=>array(
						array('name' => '数据备份', 'act'=>'index', 'op'=>'Tools'),
						array('name' => '数据还原', 'act'=>'restore', 'op'=>'Tools'),
				))
	)),
		

	'homepage'=>array('name'=>'管理首页','child'=>array(
		
			array('name' => '页面管理','child' => array(
					array('name' => '首页轮播', 'act'=>'banner', 'op'=>'Index'),
					array('name' => '文章分类', 'act'=>'category', 'op'=>'Index'),
					array('name' => '文章标签', 'act'=>'label', 'op'=>'Index'),
					array('name' => '文章列表', 'act'=>'articlelist', 'op'=>'Index'),
			)),
			
		)),
);