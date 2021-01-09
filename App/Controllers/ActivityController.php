<?php


namespace App\Controllers;


use App\Core\Responses\Response;
use App\Models\Activities;

class ActivityController extends \App\Core\AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        return $this->html();
    }

    public function activity() {
        return $this->json(Activities::getAll());
    }
}