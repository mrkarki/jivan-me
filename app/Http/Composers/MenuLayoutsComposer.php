<?php


namespace App\Http\Composers;


class MenuLayoutsComposer
{
    public function compose($view)
    {
        $view->with('_menus', $this->getMenuAsArray());
    }

    public function getMenuAsArray()
    {
        // here goes menu code
    }
}
