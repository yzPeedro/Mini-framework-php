<?php

use app\http\core\ModelCore;

class ExampleModel extends ModelCore
{
    /**
     * @param string $table
     * @return array
     */
    public function getAllUsers(string $table): array
    {
        return $this->select($table);
    }
}