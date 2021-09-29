<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
* Interface BaseRepositoryInterface
* @package App\Repositories
*/
interface BaseRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getList(): Collection;

    /**
     * @param $id
     *
     * @return Model
     */
    public function getItem($id): ?Model;

    /**
     * @param array $data
     *
     * @return Model
     */
    public function insert(array $data): Model;

    /**
     * @param array $data
     *
     * @return Model
     */
    public function update(array $data, $id): Model;

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id): bool;
}
