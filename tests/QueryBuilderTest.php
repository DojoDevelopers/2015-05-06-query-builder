<?php

namespace Dojo\Tests;

class QueryBuilderTest extends \PHPUnit_Framework_TestCase
{
	private $builder;

	public function setUp()
	{
		$this->builder = new \Dojo\QueryBuilder('tabela');
	}

	public function tearDown()
	{
		$this->builder = null;
	}

	public function testToSql()
	{

	/*
	$builder->select()
    ->where('campo1', '=', 'valor1')
    ->where('campo2', '=', 'valor2');
    */
		$this->builder->select()
			->where(
				'campo1', 
				'=',
				'valor1'
			)
			->where(
				'campo2', 
				'=',
				'valor2'
			);

			// and campo2 = 'valor2'

		$expected = "select * from tabela where campo1 = 'valor1' and campo2 = 'valor2'";

		$this->assertEquals($expected, $this->builder->toSql());
	}

	public function testToSqlWithFields() 
	{
		$fields = array('field1', 'field2');
		$this->builder->select($fields);

		$this->assertEquals(
			'select field1, field2 from tabela',
			$this->builder->toSql()
		);


	}

	public function testToSqlWithOrderByWithDefaultDirection()
	{
		$result = $this->builder
			->select(['campo1', 'campo2'])
			->order('campo');

		$this->assertEquals(
			"select campo1, campo2 from tabela order by campo asc",
			$result->toSql()
		);

	}

	public function testToSqlWithOrderByWithDirection()
	{
		$result = $this->builder
			->select(['campo1', 'campo2'])
			->order('campo', 'desc');

		$this->assertEquals(
			"select campo1, campo2 from tabela order by campo desc",
			$result->toSql()
		);

	}

	public function testSelect()
	{
		$this->assertEquals(new \Dojo\QueryBuilder('tabela'), $this->builder->select());
	}

	public function testWhere()
	{
		$builder = new \Dojo\QueryBuilder('tabela');
		$this->assertEquals(
			$builder->where('campo1', '=', 'valor1'), 
			$this->builder->where('campo1', '=', 'valor1')
		);
	}


}
