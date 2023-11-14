<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function storedata($data);
    public function updatedata($data, $id);
    public function getByid($id);
    public function delete($id);
}
