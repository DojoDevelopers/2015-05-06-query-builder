<?php

namespace Dojo;

class QueryBuilder
{
	private $table;

	private $fields = [];

	private $where = [];

	private $order = [];

	public function __construct($table)
	{
		$this->table = $table;
	}
	
	public function select($fields = [])
	{
		$this->fields = $fields;
		return $this;
	}

	public function where($condition, $operator, $value)
	{
		$this->where[] = $condition . ' ' . $operator . ' \'' . $value . '\'';
		return $this;
	}

	public function order($field, $direction = 'asc')
	{
		$this->order[] = $field . ' ' . $direction;

		return $this;
	}

	public function toSql()
	{
		$fields = empty($this->fields) ? '*' : implode(', ', $this->fields);
		$where = empty($this->where) ? '' : " where " . implode(" and ", $this->where);
		$order = empty($this->order) ? '' : " order by " . implode(', ', $this->order);
		return "select " . $fields . " from ". $this->table . $where . $order;
	}
}
