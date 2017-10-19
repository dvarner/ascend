<?php namespace App\Controller;

use Ascend\Core\BootStrap;
use Ascend\Core\Request;
use App\Model\MapPlanet;
use App\Model\MapPlanetResource;
use App\Model\MapUniverse;
use App\Model\Resource;

class RegisterController extends Controller {

    private $db = null;
    private $request = null;

    public function __construct() {
        $this->db = Bootstrap::getDBPDO();
        $this->request = new Request;
    }
}