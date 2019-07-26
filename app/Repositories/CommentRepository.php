<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:54 PM
 */

namespace App\Repositories;

class CommentRepository extends BaseRepository
{
    protected $entityName = "Comment";

    /**
     * CategoryRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }

    /**
     * @param $postId
     * @return array
     */
    public function getCommentsByPostId($postId)
    {
        return $this->entityModel->where('post_id', $postId)->get();
    }
}
