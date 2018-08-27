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
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @return void
     */
    public function __construct($name, $attribute = null)
    {
        parent::__construct($name, $attribute);

        $this->rules('dni');
    }

    /**
     * Set the validation rules for the field.
     *
     * @param  \Closure|array  $rules
     * @return $this
     */
    public function rules($rules)
    {
        parent::rules($rules);

        array_push($this->rules, 'dni');

        return $this;
    }

}
