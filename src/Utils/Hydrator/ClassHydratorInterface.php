<?php
namespace Utils\Hydrator;

interface ClassHydratorInterface
{
    /**
     * Hydrate current entity
     *  
     * @param array $data
     * @param mixed $entity
     * @return mixed entity
     */
    public function Hydrate(array $data, $entity);
    
    /**
     * Extract data from current entity
     * 
     * @param mixed $entity
     * @return array 
     */
    public function Extract($entity);
    
}