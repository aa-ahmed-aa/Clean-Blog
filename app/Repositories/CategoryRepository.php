<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:51 PM
 */

namespace App\Repositories;

class CategoryRepository extends BaseRepository
{
    protected $entityName = "Category";

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function getCategoryByIdWithPosts($categoryId)
    {
        return $this->entityModel
            ->with('posts')
            ->where('id', $categoryId)
            ->get();
    }

    /**
     * @return array
     */
    public function getAllCategoriesWithPosts()
    {
        return $this->entityModel->with('posts')->get();
    }

}
