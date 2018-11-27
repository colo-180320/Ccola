<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 15:30
 */
 namespace app\Admin\Model;
 use core\ColaModel;
 class IndexModel extends ColaModel
 {
     protected $table = 'user';
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
     public function getList()
     {
        return $this->select($this->table,'*');
     }
 }