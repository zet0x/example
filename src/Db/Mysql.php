<?

namespace App\Db;

class Mysql
{
	public function select($sql)
	{
		$arr = include(__DIR__.'/../../config/app.php');
		$mysqli = mysqli_connect($arr['host_db'], $arr['user_db'], $arr['pass_db'], $arr['name_db']);
		$mysqli->set_charset("utf8");
		if (mysqli_connect_errno($mysqli)) 
		{
			echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		}
		$res = mysqli_query($mysqli, $sql);
		while($row = mysqli_fetch_array($res))
		{
			$arr_result[] = $row;
		}
		mysqli_close($mysqli);   
		
		return $arr_result;
	}
}