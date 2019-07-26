<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:53 PM
 */

namespace App\Repositories;

use App\Traits\Paginatable;

class PostRepository extends BaseRepository
{
    use Paginatable;

    protected $entityName = "Post";

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }

    /**
     * return posts with user relations
     * @return mixed
     */
    public function getPostsFullData()
    {
        return $this->entityModel->with('user')
            ->with('comments')
            ->with('category')
            ->get();
    }

    /**
     * return single post with user relation by post_id
     * @param $postId
     * @return mixed
     */
    public function getPostWithUserById($postId)
    {
        return $this->entityModel
            ->with('user')
            ->with('category')
            ->where('id', $postId)
            ->get();
    }

}
