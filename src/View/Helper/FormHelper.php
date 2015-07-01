<?php


namespace App\View\Helper;

use Cake\View\View;

/**
 * App View class
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * For e.g. use this method to load a helper for all views:
     * `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        echo $this->Html->css('bootstrap');
    }
}