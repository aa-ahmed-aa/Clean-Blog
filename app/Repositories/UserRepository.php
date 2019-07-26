<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:41 PM
 */

namespace App\Repositories;

class UserRepository extends BaseRepository
{
    protected $entityName = "User";

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct($this->entityName);
    }
}
