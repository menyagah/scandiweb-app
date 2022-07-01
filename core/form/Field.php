<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public Model $model;
    public string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        return sprintf('
            <div class="mb-3 form-group row">
                <label class="col-sm-2 col-form-label">%s</label>
                <div class="col-sm-10">
                    <input type="%s" name="%s" value="%s" class="form-control %s">
                    <div class="invalid-feedback">%s</div>
                </div>
            </div>
        ',
            $this->attribute,
            $this->attribute === 'sku' || $this->attribute === 'name' ? 'text' : 'number',
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute));
    }
}