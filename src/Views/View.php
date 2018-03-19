<?

namespace App\Views;

class View
{
	public function __construct($path,$params)
	{
		$file = __DIR__.'/../../resourse/'.$path.'.php';
		
		if(file_exists($file))
		{
			require $file;
		}
		else
		{
			echo "no view - ".$file;
		}
		
	}

}