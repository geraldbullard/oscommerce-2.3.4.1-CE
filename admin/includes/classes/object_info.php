<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

class objectInfo 
{
    // Storage for unknown props
    private $data = [];

    public function __construct($object_array) {
        $this->objectInfo($object_array);
    }

    public function objectInfo($object_array) {
        foreach ($object_array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = tep_db_prepare_input($value);
            } else {
                $this->__set($key, tep_db_prepare_input($value));
            }
        }
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

