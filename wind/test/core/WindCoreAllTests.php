<?php
/**
 * @author xiaoxia xu <x_824@sina.com> 2010-11-16
 * @link http://www.phpwind.com
 * @copyright Copyright &copy; 2003-2110 phpwind.com
 * @license 
 */

require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'BaseTestSetting.php');
require_once R_P . '/Test/core/TestWMySqlBuilder.php';

class WindCoreAllTests extends PHPUnit_Framework_TestSuite {
	public function __construct() {
		$this->setName('WindCoreAllTests');
	}
	
    public static function suite() {
    	$suit = new self();
    	$suit->addTestSuite('TestWMySqlBuilder');
    	return $suit;
    }
}

