<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Category::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('name') and $query->where('name','like','%'.\Request::input('name').'%');

        // paginate results
        return $query->get();
    }

    public static function validationRules( $attributes = null ): array
    {
        $rules = [
            'name' => 'required|string',
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
        ];
    }

    public function getArrayAttributeByKey($key):string
    {
        $list = $this->attributes();
        $result = __('Not set');
        if(array_key_exists($key, $list)) {
            $result = $list[$key];
        }
        return $result;
    }
}
