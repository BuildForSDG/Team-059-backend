<?php

namespace App\Services;

abstract class BaseService
{
    /**
     * @var Model
     */
    public $model;

    /**
     * @var string
     * 
     * Todo: confirm if eloquent $primaryKey change can serve
     * same purpose of this without affecting relations retrieval
     * 
     * Todo: Consder moving these properties settings to db
     * or app config, also consider creating a BaseClass or 
     * trait for these properties
     */
    protected $identifier = 'id';

    /**
     * Pagination count
     * 
     * @var int
     */
    protected $paginate = 10;

    /**
     * Sort direction
     * 
     * @var string
     */
    protected $orderDirection = 'asc';

    /**
     * Sort condition
     * 
     * @var string
     */
    protected $orderBy = 'created_at';

    /**
     * Fetch a list of existing models 
     * 
     * @return Model[];
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Creates a new model
     * 
     * @param array  $payload
     * 
     * @return Model
     */
    public function create($payload)
    {
        // Todo: cache model or refresh existing cache
        return $this->model->create( $payload );
    }

    /**
     * Modifies an existing model
     * 
     * @param int $id
     * @param array $payload
     * 
     * @return Model
     */
    public function edit($id, $payload)
    {
        // Todo: cache model or refresh existing cache
        $model = $this->model->where([$this->identifier => $id])->firstOrFail();
        $model->update($payload);
        return $model;
    }

    /**
     * Deletes a single specified model
     * Only if a model is editable
     * 
     * @param int $id
     * 
     * @return Model
     */
    public function delete($id)
    {
        // Todo: cache model or refresh existing cache
        $model = $this->model->where($this->identifier, $id)->firstOrFail();
        $model->delete();
        return $model;
    }

    public function find( $id )
    {
        return $this->model->where($this->identifier, $id)->firstOrFail();
    }

    public function paginate()
    {
        //
    }

    public function orderBy()
    {
        return $this->model->orderBy($this->orderBy, $this->orderDirection)->get();
    }

    public function cache()
    {
        //
    }
}