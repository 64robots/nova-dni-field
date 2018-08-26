<?php

namespace R64\NovaDniField;

use Laravel\Nova\Fields\Field;

class Dni extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-dni-field';

    /**
     * Set the validation rules for the field.
     *
     * @param  \Closure|array  $rules
     * @return $this
     */
    public function rules($rules)
    {
        $this->rules = is_string($rules) ? func_get_args() : $rules;

        array_push($this->rules, 'dni');

        return $this;
    }

}
