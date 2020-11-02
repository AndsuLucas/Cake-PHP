<?php 
namespace App\View\Helper;

use Cake\View\Helper;

class MoneyHelper extends Helper
{
	public function format($value) {
		return 'R$' . number_format($value, 2, ',', '.');
	}
}