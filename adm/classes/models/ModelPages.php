<?php 
class ModelPages extends BaseCore
{
    protected $_table = 'pages';
    protected $_oneRow = array();
    protected $_id;
    protected $_fields = array(
                  'page' => '',
                  'keywords' => '',
                  'title' => '',
                  'description' => '',
                  'content' => '',
               );
    
    public function __construct($id = false)
    {
        $this->_id = $id;
    }
    public function getCollection()
    {
       $conn = $this->getConnect();
       $result = $conn->prepare('SELECT * FROM ' . $this->_table );
       $result->execute();
       return $result->fetchAll();
    }
    public function getOnePage($asArray = true)
    {
       $result = $this->getConnect()->prepare('SELECT * FROM ' . $this->_table . ' WHERE id = :idPage') ;
       $result->execute(array(':idPage' => $this->_id));
       $this->_oneRow = $result->fetch(PDO::FETCH_ASSOC);
       if ($asArray) {
        return $this->_oneRow;
       }
       return $this;
    }
    
    public function toJson()
    {
        return json_encode($this->_oneRow);
    }
    
    public function setData($data)
    {
         foreach ($this->_fields as $fname =>$val) {
           if (isset($data[$fname]) && isset($this->_fields[$fname])) {
            $this->_fields[$fname] = $data[$fname];
           }
         }
         
         return $this;
    }
    
    public function save()
    {
    
         if ((int)$this->_id) {
          return $this->toUpdate();
         } else {
          return $this->toAdd();
         }
    }
    
    protected function toAdd()
    {
       $result = $this->getConnect()
        ->prepare('INSERT INTO ' . $this->_table . '(' . implode(',', array_keys($this->_fields)) . ') VALUES (?,?,?,?,?)') ;
       $result->execute(array_values($this->_fields));
      
       return true;
    }
    
    protected function toUpdate()
    {
       $result = $this->getConnect()
       ->prepare('UPDATE `' . $this->_table . '` SET
            `page` = ?,
            `keywords` = ?,
            `title` = ?,
            `description` = ?,
            `content` = ? 
        WHERE `id` = ' . $this->_id ) ;
       return $result->execute(array_values($this->_fields));
    }
    
}