<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Baum\Node;

class Category extends Node
{
    protected $table = 'categories';


    public static function get($type)
    {
        if ($type == config('app.category_admin'))
            $listCategory = Category:: orderBy('lft')->get();

//        if ($type == config('app.category_admin_product'))
//            $listCategory = Category:: orderBy('lft')->get();

        if ($type == config('app.category_site'))
            $listCategory = Category:: orderBy('lft')->where('is_active', 1)->get();


        $result = '';
        $depth = -1;
        $flag = false;

        foreach ($listCategory as $category)
        {
            while ($category->depth > $depth)
            {
                $result = $result . "<ul class='tree-node-$category->depth'>\n<li id='".$category->id."'>";
                $flag = false;
                $depth++;
            }

            while ($category->depth < $depth)
            {
                $result = $result ."</li>\n</ul>\n";
                $depth--;
            }

            if ($flag) {
                $result = $result . "</li>\n<li  id='".$category->id."'>";
                $flag = false;
            }

            $arrow = ($type == config('app.category_site') && $category->depth == 0 && !$category->isLeaf()) ? "<i class='fa fa-chevron-right'> </i></a>" : "";

            $class_link = '';
            if ($type == config('app.category_site'))
                $link = url('product?id_category='.$category->id);

            if ($type == config('app.category_admin_product'))
                $link = url('admin/product/'.$category->id);

            if ($type == config('app.category_admin'))
            {
                $link = '#';
                $class_link = $category->is_active == 0 ? 'tree-not-active' : '';
            }

            $result = $result . "<a class='$class_link' href='".$link."' / >" .  ($type == config('app.category_site') ? str_limit($category->name, 30) : $category->name) . "$arrow </a>";

            if ($type == config('app.category_admin')) {
                $class = $category->is_active == 1 ? 'btn-danger' : 'btn-primary';

                $showButton = true;
                $listAncestors = $category->getAncestors();
                foreach ($listAncestors as $ancestor)
                {
                    if($ancestor->is_active == 0)
                    {
                        $showButton = false;
                        break;
                    }
                }

                if ($showButton)
                    $result = $result . "<a class='btn btn-xs $class set-active' href='" . url('admin/category-active/' . $category->id) . "'>" .
                        ($category->is_active == 1 ? 'Скрыть' : 'Показать') . "</a>";

            }

            $flag = true;
        }

        while ($depth-- > -1) {
            $result = $result . "</li>\n</ul>\n";
        }

        $result = $result . "<button>add</button>";

        return $result;
    }
}

