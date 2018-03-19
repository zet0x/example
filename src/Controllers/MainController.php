<?
namespace App\Controllers;

use App\Controllers\Controller;
use App\Views\View;
use App\Db\Mysql;

class MainController extends Controller
{
	public function list()
	{
		$query = 'SELECT * FROM `content` WHERE 1';
		$db = Mysql::select($query);
		$view = new View("index",$db);
	}
	public function detail($id)
	{
		$slugs = Mysql::select('SELECT `link` FROM `content` WHERE 1');
		$slug = [];
		foreach ($slugs as $key => $value) {
			array_push($slug, $value[0]);
		}
		if(in_array($id, $slug))
		{
			$db =  Mysql::select("SELECT * FROM `content` WHERE link='$id'");
			$view = new View("detail",$db);
		}
		else
		{
			echo "No slug - ".$id;
		}
	}
}