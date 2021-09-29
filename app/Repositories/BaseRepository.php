<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return Model
     */
    public function getList(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return Model
     */
    public function getItem($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param array $data
    *
    * @return Model
    */
    public function insert(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return Model
     */
    public function update(array $data, $id): Model
    {
        $modelToUpdate = $this->model->find($id);
        return $modelToUpdate->update($data);
    }

    /**
     * @param $id
     *
     * @return bool
    */
    public function delete($id): bool
    {
        return $this->model->delete($id);
    }
}
