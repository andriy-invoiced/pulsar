<?php

/**
 * @author Jared King <j@jaredtking.com>
 *
 * @see http://jaredtking.com
 *
 * @copyright 2015 Jared King
 * @license MIT
 */

namespace Pulsar\Relation;

use Pulsar\Model;

class Pivot extends Model
{
    protected static $properties = [];

    /**
     * @var string
     */
    protected $_tablename;

    public function setTablename($tablename)
    {
        $this->_tablename = $tablename;
    }

    public function getTablename()
    {
        return $this->_tablename;
    }

    public function setProperties($localKey, $foreignKey)
    {
        self::$properties = [
            $localKey => [],
            $foreignKey => [],
        ];
        $this->initialize();
    }
}