<?php


namespace Controllers;


class Index extends BaseController
{
    public function getIndex()
    {
        $headerTemplate = $this->includeTemplate("v_header");
        print $this->includeTemplate('v_index', ["headerTemplate" => $headerTemplate]);
    }

}