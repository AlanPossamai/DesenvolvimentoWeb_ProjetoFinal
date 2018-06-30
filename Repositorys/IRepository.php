<?php

interface IRepository {

	public function add($obj);
	public function update($obj);
	public function delete($obj);
	public function getById($id);
	public function getAll();

}