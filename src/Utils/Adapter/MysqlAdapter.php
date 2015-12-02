<?php
namespace Utils\Adapter;

class MysqlAdapter
{
    protected $link;
    
    public function __construct($options)
    {
        $this->link =mysqli_connect($options['host'],
            $options['user'],
            $options['password']
            );
        mysqli_select_db($this->link, $options['database']);
    }
    
    public function Execute($query)
    {
        $result = mysqli_query($this->link, $query);
        return $result;
    }
    
    public function Select($query)
    {
        $result = mysqli_query($this->link, $query);
        while($row = mysqli_fetch_assoc($result))
        {
            $rows[]=$row;
        }
        return $rows;
    }
}