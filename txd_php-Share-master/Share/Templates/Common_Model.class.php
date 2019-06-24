<?php
namespace module_name_m\Model;

use module_name_m\Service\ModelService;

/**
 * object_cn_name Model层
 * Class object_nameModel
 * @package module_name_m\Model
 * User: AUTHOR
 * Date:TIME
 */
class object_nameModel extends ModelService {

    /**
     * @var array
     * 自动验证   使用create()方法时自动调用
     */
    protected $_validate = array();
    /**
     * @var array
     * 自动完成   新增时
     *
     */
    protected $_auto = array ();


}