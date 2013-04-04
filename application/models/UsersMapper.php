<?php

    class Application_Model_UsersMapper
    {
        protected $_dbTable;

        public function setDbTable($dbTable)
        {
            if (is_string($dbTable)) {
                $dbTable = new $dbTable();
            }
            if (!$dbTable instanceof Zend_Db_Table_Abstract) {
                throw new Exception('Invalid table data gateway provided');
            }
            $this->_dbTable = $dbTable;
            return $this;
        }

        public function getDbTable()
        {
            if (null === $this->_dbTable) {
                $this->setDbTable('Application_Model_DbTable_Users');
            }
            return $this->_dbTable;
        }

        public function save(Application_Model_Users $users)
        {
            $data = array(
                'username' => $users->getUsername(),
                'password' => $users->getPassword(),
                'id'       => $users->getId(),
                'email'    => $users->getEmail(),
                'mobile'   => $users->getMobile(),
                'name'     => $users->getName(),
            );

            if (null === ($id = $users->getId())) {
                unset($data['id']);
                $this->getDbTable()->insert($data);
                $last_id = $this->getDbTable()->getAdapter()->lastInsertId();
                return $last_id;
            } else {
                $this->getDbTable()->update($data, array('id = ?' => $id));
                return $id;
            }
        }
    }
?>
