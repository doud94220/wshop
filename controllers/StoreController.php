<?php
namespace FwTest\Controller;
use FwTest\Classes as Classes;

class StoreController extends AbstractController
{
    /**
     * @Route('/store_list.php')
     */
    public function index()
    {
    	$db = $this->getDatabaseConnection();

        $filter = (isset($_GET['filter']) && !empty($_GET['filter']))? $_GET['filter']:0;
        $sort = (isset($_GET['sort']) && !empty($_GET['sort']))? $_GET['sort']:0;

        if (!empty($filter))
        {
            $list_store = Classes\Store::getWithFilter($db, 0, $this->array_constant['store']['nb_stores'], $filter);
            echo $this->render('store/list.tpl', ['list_store' => $list_store]);
        }
        elseif (!empty($sort))
        {
            $list_store = Classes\Store::getWithSort($db, 0, $this->array_constant['store']['nb_stores'], $sort);
            echo $this->render('store/list.tpl', ['list_store' => $list_store]);
        }
        else
        {
            $list_store = Classes\Store::getAll($db, 0, $this->array_constant['store']['nb_stores']);
            echo $this->render('store/list.tpl', ['list_store' => $list_store]);
        }
    }

    /**
     * @Route('/store_detail.php')
     */
    public function detail()
    {
        $db = $this->getDatabaseConnection();

    	$id = (isset($_GET['id']) && !empty($_GET['id']))? $_GET['id']:0;

    	if (!empty($id)) {

    		$store = new Classes\Store($db, $id);

    		if (!empty($store)) {
    			echo $this->render('store/detail.tpl', ['store' => $store]);
    		} else {
    			$this->_redirect('magasin_list.php');
    		}
    		
    	} else {
    		$this->render('magasin_list.php');
    	}

    }

    /**
     * @Route('/store_add.php')
     */
    public function add()
    {
        echo $this->render('store/add.tpl', []);
    }

    /**
     * @Route('/store_add_validation.php')
     */
    public function addValidation()
    {
        $db = $this->getDatabaseConnection();

        $nomMagasin = $_POST['nom-magasin'];

        $response = Classes\Store::insert($db, $nomMagasin);

        if($response == true)
        {
            echo "Creation de magasin reussie !";
        }
        else
        {
             echo "Echec de la creation de magasin...";
        }
    }

    /**
     * @Route('/store_delete.php')
     */
    public function delete()
    {
        echo $this->render('store/delete.tpl', []);
    }

    /**
     * @Route('/store_delete_validation.php')
     */
    public function deleteValidation()
    {
        $db = $this->getDatabaseConnection();

        $_DELETE = array();
        parse_str(file_get_contents('php://input'), $_DELETE);
//var_dump($_PUT);die;
        $idMagasin = $_DELETE['id-magasin'];
        $response = Classes\Store::delete($db, $idMagasin);

        if($response == true)
        {
            echo "Suppression de magasin reussie !";
        }
        else
        {
             echo "Echec de la suppression de magasin...";
        }
    }

    /**
     * @Route('/store_modify.php')
     */
    public function modify()
    {
        echo $this->render('store/modify.tpl', []);
    }

    /**
     * @Route('/store_modify_validation.php')
     */
    public function modifyValidation()
    {
        $db = $this->getDatabaseConnection();

        $_PUT = array();
        parse_str(file_get_contents('php://input'), $_PUT);

        $idMagasin = $_PUT['id-mag'];
        $nouveauNomMagasin = $_PUT['maj-nom-mag'];

        $response = Classes\Store::modify($db, $idMagasin, $nouveauNomMagasin);

        if($response == true)
        {
            echo "Modification de magasin reussie !";
        }
        else
        {
             echo "Echec de la modification de magasin...";
        }
    }
}
