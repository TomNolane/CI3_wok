<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files
{
	public function getDir($dir, $key='all')
	{
		if (is_dir($dir))
		{
			$res = array();
			
			$handle = opendir($dir);
			while ($file = readdir($handle))
			{
				if ($file != '.' && $file != '..')
				{
					if ($key == 'files' || $key == 'f')
					{// Собирает только файлы
						if (is_file($dir.'/'.$file))
						{
							$res[] = $file;
						}
					}
					elseif ($key == 'dirs' || $key == 'd')
					{// Собирает только директории
						if (is_dir($dir.'/'.$file))
						{
							$res[] = $file;
						}
					}
					else
					{// Собирает и файлы, и дирктории
						$res[] = $file;
					}
				}
			}
			
			return $res;
		}
		else
		{
			return false;
		}
	}
	
	public function getDirs($dir)
	{
		return $this->getDir($dir, 'dirs');
	}
	
	public function get($dir, $key='all')
	{
		return $this->getDir($dir, $key);
	}
}

/* End of file Files.php */
?>