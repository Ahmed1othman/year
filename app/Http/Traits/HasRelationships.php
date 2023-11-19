<?php

namespace App\Http\Traits;

trait HasRelationships
{
    public function getRelatedData($relationName)
    {
        if (method_exists($this, $relationName)) {
            return $this->$relationName;
        }

        return null;
    }

    public function __call($method, $parameters)
    {
        if (str_starts_with($method, 'get')) {
            $relationName = lcfirst(substr($method, 3));
            return $this->getRelatedData($relationName);
        }

        return parent::__call($method, $parameters);
    }
}
