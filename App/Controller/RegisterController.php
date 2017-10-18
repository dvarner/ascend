<?php namespace App\Controller;

use Ascend\BootStrap as BS;
use App\Model\MapPlanet;
use App\Model\MapPlanetResource;
use App\Model\MapUniverse;
use App\Model\Resource;
use Ascend\Request;
use Ascend\Route;

class RegisterController extends Controller {

    private $db = null;
    private $request = null;

    public function __construct() {
        $this->db = BS::getDBPDO();
        $this->request = new Request;
    }
}