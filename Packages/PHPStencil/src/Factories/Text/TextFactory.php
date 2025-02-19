<?php
/**
 * Created by PhpStorm.
 * User: vamoose
 * Date: 2016/11/28
 * Time: 9:09 AM
 */

namespace EONConsulting\PHPStencil\src\Factories\Text;

use EONConsulting\PHPStencil\src\Factories\AdapterFactory;
use EONConsulting\PHPStencil\src\Factories\Factory;

/**
 * Class TextFactory
 * @package EONConsulting\PHPStencil\src\Factories\Text
 */
class TextFactory implements Factory  {

    protected $adapter;

    /**
     * TextFactory constructor.
     * @param AdapterFactory $adapter
     */
    public function __construct(AdapterFactory $adapter) {
        $this->adapter = $adapter;
    }

    /**
     * Return a new Text object with the correct adapter
     * @param $config
     * @return Text
     */
    public function make($config) {
        return new Text($this->adapter->make($config));
    }

}