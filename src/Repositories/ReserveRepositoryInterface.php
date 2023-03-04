<?php
namespace Project\Repositories;

use Project\Models\ReserveModel;
use Project\Controllers\Validator;

interface ReserveRepositoryInterface
{
    public function find($id);

    public function get();

    public function save($reservation);

    public function remove($id);
}