<?php

use App\Lib\Calculate;

class CalculateTest extends PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		$this->calculator = new Calculate();
	}

	public function inputNumbers()
	{
		return [
			[2, 2, 4],
			[2.5, 2.5, 5],
			[-4, 5, 1],
		];
	}


	/**
	 *
	 * @dataProvider inputNumbers
	 *
	 */
	public function testAddNumbers($x, $y, $sum)
	{
			
		$this->assertEquals($sum, $this->calculator->add($x, $y));

	}

	/**
	 *
	 *@expectedException InvalidArgumentException
	 *
	 */

	public function testThrowsExceptionIfNonNumericIsPassed()
	{
		$this->calculator->add('a', []);
	} 

}
































