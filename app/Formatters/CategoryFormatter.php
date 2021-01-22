<?php
namespace App\Formatters;

use App\Models\Category;

class CategoryFormatter
{
    public static function getAll(): array
    {
        $infos = Category::all();
        $result = [null =>'Choose category'];

        foreach ($infos as $info)
        {
            $result[$info->id] = $info->name;
        }
        return $result;
    }

    public static function getNameById($id)
    {
        $info = Category::where(['id' => $id])->first();

        if (isset($info['name']))
            return $info['name'];
        return 'Not set';
    }
}
?>
