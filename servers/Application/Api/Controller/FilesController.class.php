<?php
/**
 * 文件接口API
 * ============================================================================
 * 版权所有 (C) 
 * 网站地址:
 * ============================================================================
 * $Version: v1.0.0 Beta $
 * $Author: LWX <liwenxuan@pokpets.com> $
 * $Date: 2015/12/3 15:33 $
 * $Id: FilesController.class.php 15:33 2015/12/3 $
**/
namespace Api\Controller;
use Think\Controller;
class FilesController extends PublicController {
	
	public function __construct() {
		parent::__construct();
	}

	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 文件上传 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2015/12/5
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type POST
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $uid 当前操作的用户ID					
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $utype 当前操作的用户类型 (0:暂无,1:前台user表用户,2后台users表用户)	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $m 文件存于的第一级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $f 文件存于的第二级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $type 文件类型
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $content_files 文件内容
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function Upload() {
		if(IS_POST) {
			$data = array();
			$data['uid'] = I('post.uid', '', 'intval');
			$m = I('post.m', '', 'trim');
			$f = I('post.f', '', 'trim');
			$data['type'] = I('post.type', '', 'trim');
			$data['utype'] = I('post.utype', '', 'intval');
			$content = I('post.content_files', '', 'trim');
			$data['size'] = strlen($content);
			$data['path'] = $m.'/'.$f;

			$data['type'] = split('/', $data['type']);
			if(count($data['type']) > 1) {
				$data['type'] = $data['type'][1];
			} else {
				$data['type'] = $data['type'][0];
			}
				
			if(!in_array($data['type'], C('FILESTYPE'))) {
				output(10004);
			} else if($data['size'] > 3145728 || $data['size'] == 0) {
				output(10005);
			}

			if(empty($m) || empty($f)) {
				output(10009);
			}

			$data['time'] = time();
			$time_file = date('Y/m/d/H/i/s', $data['time']);
			$data['key'] = token($time_file, true);
			$rile_route = './Uploads/'.$m.'/'.$f.'/'.$time_file.'/'.$data['key'].'.'.$data['type'];
			
			if(M('files')->data($data)->add()) {

				$File = new \Org\Util\File;
				$File->createFile($rile_route);
				$File->setFile($rile_route, $content);
				
				$url = C('FILEURL').'/'.$m.'/'.$f.'/'.$time_file.'/'.$data['key'].'.'.$data['type'];
				$data = array(
					'key'=>$data['key'],
					'url'=>$url
				);
				output(0, $data);
			}
		}
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 文件预览(大于一天的文件保存时间，长时间使用请调用保存方法 UploadPreviewSave )
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2016/6/30
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type POST
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $type 文件类型
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $content_files 文件内容
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function UploadPreview() {
		if(IS_POST) {
			$type = I('post.type', '', 'trim');
			$type = split('/', $type);
			if(count($type) > 1) {
				$type = $type[1];
			} else {
				$type = $type[0];
			}
			$content = I('post.content_files', '', 'trim');
			$size = strlen($content);

			if(!in_array($type, C('FILESTYPE'))) {
				output(10004);
			} else if($size > 3145728 || $size == 0) {
				output(10005);
			}
			
			$time = time();
			$time_file = date('Y/m/d/H/i/s', $time);
			$key = token($time_file, true);
			$key = $key.''.$time.''.$type;

			$rile_route = './Uploads/Preview/'.$time_file.'/'.$key.'.'.$type;
			
			$File = new \Org\Util\File;
			$File->createFile($rile_route);
			$File->setFile($rile_route, $content);
			
			$url = C('FILEURL').'/Preview/'.$time_file.'/'.$key.'.'.$type;
			$data = array(
				'key'=>$key,
				'url'=>$url
			);
			output(0, $data);
		}
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 文件剪切预览(大于一天的文件保存时间，长时间使用请调用保存方法 UploadPreviewSave )
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2016/12/9
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type POST
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $type 文件类型
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $content_files 文件内容
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function UploadCutPreview() {		
		if(IS_POST) {
			$type = I('post.type', '', 'trim');
			$type = split('/', $type);
			if(count($type) > 1) {
				$type = $type[1];
			} else {
				$type = $type[0];
			}
			$content = I('post.content_files', '', 'trim');
			$size = strlen($content);

			if(!in_array($type, C('FILESTYPE'))) {
				output(10004);
			} else if($size > 3145728 || $size == 0) {
				output(10005);
			}
			
			$time = time();
			$time_file = date('Y/m/d/H/i/s', $time);
			$key = token($time_file, true);
			$key = $key.''.$time.''.$type;

			$rile_route = './Uploads/Preview/'.$time_file.'/'.$key.'.'.$type;
			
			$File = new \Org\Util\File;
			$File->createFile($rile_route);
			$File->setFile($rile_route, $content);
			
			$filename = $rile_route;
			$info = getimagesize($filename);

			$source_width = $info[0];
			$source_height = $info[1];

			$cropped_width = $source_width;
			$cropped_height = intval(($cropped_width * 9) / 16);

			$source_x = 0;
			$source_y = 0;

			$image_type = $info['mime'];

			 switch ($image_type){
				case 'image/gif':
				  $source_image = imagecreatefromgif($filename);
				  break;
				 
				case 'image/jpeg':
				  $source_image = imagecreatefromjpeg($filename);
				  break;
				 
				case 'image/png':
				  $source_image = imagecreatefrompng($filename);
				  break;
				 
				default:
				  return false;
				  break;
			  }
			  
			  $key_array = array();
			  $url_array = array();
			  for($one=0; $one < $source_height; $one += $cropped_height) {

				  $source_y = $one;	 
				  
				  if(($source_height - $cropped_height) < $source_y) {
					   $cropped_height = $cropped_height - ($source_y - ($source_height - $cropped_height));
				  }
					
				  $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);
				  $color = imagecolorallocate($cropped_image, 255, 255, 255);
				  imagecopy($cropped_image, $source_image, 0, 0, $source_x, $source_y, $cropped_width, $cropped_height);
				  
				  $key = token($time_file, true);
				  $key = $key.''.$time.'png';
				  $key_array[] = $key;
				  $url_array[] = C('FILEURL').'/Preview/'.$time_file.'/'.$key.'.png';

				  imagepng($cropped_image, './Uploads/Preview/'.$time_file.'/'.$key.'.png');
				  imagedestroy($cropped_image);
			  }
			
			$data = array(
				'key'=>$key_array,
				'url'=>$url_array
			);
			output(0, $data);
		}
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 保存预览文件(24小时以内的预览文件)
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2016/7/1
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type GET
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String	必填 $key 预览文件的key
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String	必填 $ms 文件存于的第一级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String	必填 $fs 文件存于的第二级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $uid 当前操作的用户ID					
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $utype 当前操作的用户类型 (0:暂无,1:前台user表用户,2后台users表用户)	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function UploadPreviewSave() {
		if(IS_GET) {
				
			$key = I('get.key', '', 'trim');
			if(strlen($key) == 64) {
				$data = array(
					'key'=>$key,
					'url'=>''
				);
				output(0, $data);
			} else {
				$m = I('get.ms', '', 'trim');
				$f = I('get.fs', '', 'trim');
				$uid = I('get.uid', 0, 'intval');
				$utype = I('get.utype', 0, 'intval');
				
				$key_time = intval(substr($key, 64, 10));
				$key_type = substr($key, 74);
				$key_one =  substr($key, 0, 64);
				$time = time();
				
				if(empty($key) | empty($m) | empty($f)) {
					output(10001);
				} else if(!in_array($key_type, C('FILESTYPE'))) {
					output(10004);
				} else if(($time - $key_time) > 86400) {
					output(10011);
				}
				
				$File = new \Org\Util\File;
				$path_one = './Uploads/Preview/'.date('Y/m/d/H/i/s', $key_time).'/'.$key.'.'.$key_type;
				
				$data = array();
				$data['size'] = $File->filesizes($path_one);
				$data['key'] = token($path_one, true);
				$data['path'] = $m.'/'.$f;
				$data['uid'] = $uid;
				$data['utype'] = $utype;
				$data['time'] = $time;
				$data['type'] = $key_type;
				
				if($data['size'] > 3145728 || $data['size'] == 0) {
					output(10005);
				}
				
				if(M('files')->data($data)->add()) {
					$path_two = './Uploads/'.$data['path'].'/'.date('Y/m/d/H/i/s', $time).'/'.$data['key'].'.'.$data['type'];
					$File->copyFile($path_one, $path_two);
					$url = C('FILEURL').'/'.$data['path'].'/'.date('Y/m/d/H/i/s', $time).'/'.$data['key'].'.'.$data['type'];
					$data = array(
						'key'=>$data['key'],
						'url'=>$url
					);
					output(0, $data);
				}
			}
		}
	}

	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 保存预览文件批量(24小时以内的预览文件)
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2016/7/8
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type GET
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Array	必填 $key 预览文件的key数组 array('字段名'=>'预览文件字段值', ...)
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String	必填 $ms 文件存于的第一级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String	必填 $fs 文件存于的第二级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $uid 当前操作的用户ID					
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $utype 当前操作的用户类型 (0:暂无,1:前台user表用户,2后台users表用户)	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function UploadPreviewSaveBatch() {
		
		$keys = I('get.key', '', 'trim');
		$m = I('get.ms', '', 'trim');
		$f = I('get.fs', '', 'trim');
		$uid = I('get.uid', 0, 'intval');
		$utype = I('get.utype', 0, 'intval');
		$time = time();

		if(empty($keys) | empty($m) | empty($f)) {
			output(10001);
		} else {

			$File = new \Org\Util\File;
			
			foreach($keys as $k=>$key) {
				$key = trim($key);

				if(strlen($key) != 64) {
					$key_time = intval(substr($key, 64, 10));
					$key_type = substr($key, 74);
					$key_one =  substr($key, 0, 64);
					if(!in_array($key_type, C('FILESTYPE'))) {
						output(10004, array($k=>$key));
					} else if(($time - $key_time) > 86400) {
						output(10011, array($k=>$key));
					} else {
						$path_one = './Uploads/Preview/'.date('Y/m/d/H/i/s', $key_time).'/'.$key.'.'.$key_type;
						$size = $File->filesizes($path_one);
						if($size > 3145728 || $size == 0) {
							output(10005, array($k=>$key));
						}
					}
				}
			}
			
			$arrays = array();
			foreach($keys as $k=>$key) {
				$key = trim($key);
				if(strlen($key) != 64) {
					$key_time = intval(substr($key, 64, 10));
					$key_type = substr($key, 74);
					$key_one =  substr($key, 0, 64);
					
					$path_one = './Uploads/Preview/'.date('Y/m/d/H/i/s', $key_time).'/'.$key.'.'.$key_type;
					
					$data = array();
					$data['size'] = $File->filesizes($path_one);
					$data['key'] = token($path_one, true);
					$data['path'] = $m.'/'.$f;
					$data['uid'] = $uid;
					$data['utype'] = $utype;
					$data['time'] = $time;
					$data['type'] = $key_type;
					
					if(M('files')->data($data)->add()) {
						$path_two = './Uploads/'.$data['path'].'/'.date('Y/m/d/H/i/s', $time).'/'.$data['key'].'.'.$data['type'];
						$File->copyFile($path_one, $path_two);
						$url = C('FILEURL').'/'.$data['path'].'/'.date('Y/m/d/H/i/s', $time).'/'.$data['key'].'.'.$data['type'];
					}
					$arrays[$k] = $data['key'];
				} else {
					$arrays[$k] = $key;
				}
			}

			output(0, $arrays);
		}
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 获取文件URL
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2015/12/5
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type GET
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $key 文件KEY	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame JSON 非必 $key_json 文件KEY 数组维度最大不能超过200个
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/   
	public function GetUrl() {
		$data = array();
		if($key = I('request.key', '', 'trim')) {
			$data = M('files')->field('path, type, time')->where(array('key'=>$key))->find();
			$url = C('FILEURL').'/'.$data['path'].'/'.date('Y/m/d/H/i/s', $data['time']).'/'.$key.'.'.$data['type'];
			$data = array('url'=>$url);
		} else if($key_json = I('request.key_json', '', 'trim')) {
			foreach($key_json as $key=>$val) {
				$info = M('files')->field('path, type, time')->where(array('key'=>$key))->find();
				$url = C('FILEURL').'/'.$info['path'].'/'.date('Y/m/d/H/i/s', $info['time']).'/'.$key.'.'.$info['type'];
				$data[$key] = $url;
			}
		}
		output(0, $data);
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 删除文件
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2015/12/5
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type GET
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $key 文件KEY	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame JSON 非必 $key_json 文件KEY 数组维度最大不能超过200个
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function Del() {
		if(IS_GET) {
			$files_data = array();
			if($key = I('get.key', '', 'trim')) {
				$data = M('files')->field('path, type, time')->where(array('key'=>$key))->find();
				$url = './Uploads/'.$data['path'].'/'.date('Y/m/d/H/i/s', $data['time']).'/'.$key.'.'.$data['type'];	
				$files_data[$key] = $url;
			} else if($key_json = I('get.key_json', '', 'trim')) {
				foreach($key_json as $key=>$val) {
					$info = M('files')->field('path, type, time')->where(array('key'=>$key))->find();
					$url = './Uploads/'.$info['path'].'/'.date('Y/m/d/H/i/s', $info['time']).'/'.$key.'.'.$info['type'];
					$files_data[$key] = $url;
				}
			}
			
			$File = new \Org\Util\File;
			foreach($files_data as $key=>$val) {
				M('files')->where(array('key'=>$key))->delete();
				$File->unlinkFile($val);
			}
			output(0, array());
		}
	}
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 富文本内容图片上传(暂时弃用)
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2015/12/5
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type POST
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $uid 当前操作的用户ID					
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $utype 当前操作的用户类型 (0:暂无,1:前台user表用户,2后台users表用户)	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $m 文件存于的第一级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $f 文件存于的第二级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $content 富文本修改后的内容  htmlspecialchars  默认框架已经转换
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 非必 $content_del 富文本修改前内容  htmlspecialchars  默认框架已经转换
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	/*
	public function ContentUpload() {
		
		if(IS_POST) { 
			$data = array();
			$data['uid'] = I('post.uid', '', 'intval');
			$data['utype'] = I('post.utype', '', 'intval');
			$m = I('post.m', '', 'trim');
			$f = I('post.f', '', 'trim');
			
			$data['path'] = $m.'/'.$f;
			$data['time'] = time();
			
			$content = I('post.content', '', 'trim');
			$content = htmlspecialchars_decode($content);
			preg_match_all('/<img.*?src="(.*?)".*?>/is', $content, $match);
			$match = $match[1];
			if($match) {
				if(empty($m) || empty($f)) {
					output(10009);
				}
			}
			
			$File = new \Org\Util\File;
			$FilesDb = M('files');
			
			for($one=0; $one<count($match); $one++) {				
				$url = preg_replace("/\s+/","", $match[$one]);
				if(count(explode($_SERVER['HTTP_HOST'], $url)) > 1 | count(explode('localhost', $url)) > 1 | count(explode('127.0.0.1', $url)) > 1) {
					$data['type'] = explode('.', $url);
					$data['type'] = $data['type'][1];
					if(in_array($data['type'], C('FILESTYPE'))) {
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
						$files_content = curl_exec($ch);
						curl_close($ch);
						$data['size'] = strlen($files_content);
						$data['key'] = token($time_file, true);
						
						$time_file = date('Y/m/d/H/i/s', $data['time']);
						$data['key'] = token($time_file, true);
						$rile_route = './Uploads/'.$m.'/'.$f.'/'.$time_file.'/'.$data['key'].'.'.$data['type'];
						
						$File->createFile($rile_route);
						$File->setFile($rile_route, $files_content);
						$FilesDb->data($data)->add();
						
						$match[$one] = preg_replace('/\//', '\/', $match[$one]);
						$content = preg_replace('/'.$match[$one].'/', $data['key'], $content);
					}
				}	
			}
			
			if($content_del = I('post.content_del', '', 'trim')) {
				$content_del = htmlspecialchars_decode($content_del);
				preg_match_all('/<img.*?src="(.*?)".*?>/is', $content_del, $match);
				$match = $match[1];
						
				for($one=0; $one<count($match); $one++) {
					$match[$one] = preg_replace("/\s+/","", $match[$one]);
					if(strlen($match[$one]) == 64) {
						M('files')->where(array('key'=>$match[$one]))->delete();
					}
				}	
			}
			
			output(0, array('content'=>htmlspecialchars($content)));
			
		}
	}
	*/
	
	/**
	 *+--------------------------------------------------------------------------------------------------------------------
	 * 富文本内容获取对外展现时用
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @Author LWX  Date:2015/12/5
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @access public
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @type POST
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $uid 当前操作的用户ID					
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame Int 非必 $utype 当前操作的用户类型 (0:暂无,1:前台user表用户,2后台users表用户)	
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String 必填 $m 文件存于的第一级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @parame String  必填 $f 文件存于的第二级目录 
	 *+--------------------------------------------------------------------------------------------------------------------
	 * @return JSON
	 *+--------------------------------------------------------------------------------------------------------------------
	**/
	public function ContentGet() { 
		if(IS_POST) { 
			/*
			$content = I('post.content', '', 'trim');
			$content = htmlspecialchars_decode($content);
			preg_match_all('/<img.*?src="(.*?)".*?>/is', $content, $match);
			$match = $match[1];
			$FilesDb = M('files');
			for($one=0; $one<count($match); $one++) {
				$match[$one] = preg_replace("/\s+/","", $match[$one]);
				if(strlen($match[$one]) == 64) {
					if($data = $FilesDb->field('path, type, time')->where(array('key'=>$match[$one]))->find()) {
						$url = C('FILEURL').'/'.$data['path'].'/'.date('Y/m/d/H/i/s', $data['time']).'/'.$match[$one].'.'.$data['type'];
						$content = preg_replace('/'.$match[$one].'/', $url, $content);
					}
				}
			}	
			output(0, array('content'=>$content));
			*/
			
			$content = I('post.content', '', 'trim');
			$content = htmlspecialchars_decode($content);
			$content = preg_replace('/\/Uploads\/ueditor\//', C('UEDITOR').'/Uploads/ueditor/', $content);
			output(0, array('content'=>$content));

		}
	}

}