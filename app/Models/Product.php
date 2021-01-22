<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $guarded = ["id","created_at","updated_at"];

    public static function validationRules( $attributes = null ): array
    {
        $rules = [
            'name' => 'required|string',
            'photo' => 'required|string|url',
            'price' => 'required',
            'category' => '',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

    public function attributes():array
    {
        return [
            'id' => __("Id"),
            'name' => __("Name"),
            'photo' => __("Photo"),
            'price' => __("Price"),
            'category_id' => __("Category"),
        ];
    }
}
