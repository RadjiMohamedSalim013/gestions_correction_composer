<?php 

namespace App\Models;

abstract class BaseModel {

    public function toArray(): array {
        return get_object_vars($this);
    }


    public function formArray(array $data): self {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            } elseif (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }
}