<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function makeValidation($request, $post_name, $additional_rules = null, $additional_attrs = null)
    {
        $rules = (array)\Lang::get("rules.{$post_name}");
        if ($additional_rules) {
            $rules = array_merge($rules, $additional_rules);
        }

        $attributes = (array)\Lang::get("attributes.{$post_name}");
        if ($additional_attrs) {
            $attributes = array_merge($attributes, $additional_attrs);
        }

        $this->validate($request, $rules, [], $attributes);
    }
}
