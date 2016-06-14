<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class UploadComponent extends Component
{

	public function send($file,$new=true,$upload='uploads')
	{
		if($file['size']!==0  && $file['error']===0)
		{
			$filename=time().'_'.$file['name'];
			$file_tmp_name=$file['tmp_name'];
			$dir=WWW_ROOT.'img'.DS.$upload;
			$extensions=['jpg','png','jpeg'];
			if(in_array(substr(strrchr($filename,'.'),1),$extensions))
			{
				if(!file_exists($dir))
				{
					mkdir($dir);
				}
				if(move_uploaded_file($file_tmp_name,$dir.DS.$filename))
				{
					return $filename;
				}
			}
			
		}
		else
		{
			if($new==true)
			{
				$filename='default.jpg';
				return $filename;
			}
		}
		return false;
	}
}