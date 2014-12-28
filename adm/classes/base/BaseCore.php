<?php
class BaseCore
{
    private $_host = 'mysql:dbname=ecmonstr_base;host=localhost';
    private $_user = 'ecmonstr_user';
    private $_pass = '[R1$(e3=+7U^';
    private $_dbname = 'ecmonstr_base';
    
    protected $_isInit = false;
    protected  $_mysqlConnect = false;
    
    public function getConnect()
    {
        if (!$this->_mysqlConnect) {
           $this->_mysqlConnect = new PDO("mysql:dbname=ecmonstr_base;host=localhost", 'ecmonstr_pdo','[R1$(e3=+7U^');
            $this->_mysqlConnect->exec("set names utf8");
            return $this->_mysqlConnect;
        }
        return $this->_mysqlConnect;
    }
}