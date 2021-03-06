<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 1:20 PM
 */

namespace App\Repositories;

use App\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Paginatable;

abstract class BaseRepository implements RepositoryContract
{
    use Paginatable;

    protected $entityName;
    protected $entityModel;

    /**
     * BaseRepository constructor.
     * @param string $entityModel
     */
    public function __construct( string $entityModel )
    {
        if(empty($this->entityName))
        {
            throw new \RuntimeException(
                get_class($this) . '::$entityModel is not found'
            );
        }
        $this->entityName = 'App\\Models\\'.$entityModel;
        $this->entityModel = new $this->entityName();
    }

    /**
     * Add New Entity
     * @param array $data
     * @return Model
     */
    public function addItem(array $data)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                if ($value) {
                    $this->entityModel->$key = $value;
                }
            }
            $this->entityModel->save();
        }
        return $this->entityModel;
    }

    /**
     * Get Single Entity By id
     * @param $itemId
     * @return mixed
     */
    public function editItem($itemId, array $data)
    {
        $item =  $this->getItemByID($itemId);
        if ($data) {
            foreach ($data as $key => $value) {
                if ($value) {
                    $item->$key = $value;
                }
            }
            $item->save();
        }
        return $item;
    }

    /**
     * Get Single Entity By id
     * @param $itemId
     * @return Model
     */
    public function getItemByID($itemId)
    {
        return $this->entityModel->find($itemId);
    }

    /**
     * Delete Item By Id
     * @param integer $itemId
     * @return integer
     */
    public function deleteItemById($itemId)
    {
        return $this->entityModel->delete($itemId);
    }

    /**
     * Get All Entities at table
     * @return array $items
     */
    public function getAllItems()
    {
        return $this->entityModel->all();
    }

    /**
     * @return array $items
     */
    public function paginateAllItem()
    {
        return $this->entityModel->paginate(10);
    }
}
