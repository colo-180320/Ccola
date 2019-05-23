<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:30
 */
namespace app\Index\Model;
use core\ColaModel;
class OwnModel extends ColaModel
{
    protected $table = 'own';
    protected $providers = 'db';
    protected $createAtColumn = 'created_at';

    protected $updateAtColumn = 'updated_at';

    protected $createdByColumn = 'created_by';

    protected $updatedByColumn = 'updated_by';

    protected $deletedAtColumn = 'deleted_at';

    protected $deletedByColumn = 'deleted_by';

    public function __construct()
    {
        parent::__construct($this->providers);
    }
    public function getList($where)
    {

        return $this->select($this->table,'*','',$where);
    }

}