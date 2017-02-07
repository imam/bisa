<?php

namespace Bisa;


class PermissionModel
{
    public $slug;

    public function __construct($slug = null)
    {
        if($slug) $this->slug = $slug;
    }
}