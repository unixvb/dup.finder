<?php
	function get_files_list($path)
	{
		if (!file_exists($path))
			echo "Путь $path не существует";
		else
		{
			$start = microtime(true);
			$result = array();
			$fp = fopen('dup_files.txt', 'a');
			fwrite($fp, PHP_EOL . PHP_EOL . "****** " . date("Y-m-d H:i:s") . " ******" . PHP_EOL . PHP_EOL);
			foreach (glob($path . "\*.*") as $file)
			{
				$value = md5_file($file);
				if (in_array($value, $result))
					fwrite($fp, $file . PHP_EOL);
				else
					$result[$file] = md5_file($file);
			}
			fclose($fp);
			echo "Результат записан в dup_files.txt <br/>";
			$time = microtime(true) - $start;
			echo "Скрипт выполнялся " . $time . " сек.";
		}
	}