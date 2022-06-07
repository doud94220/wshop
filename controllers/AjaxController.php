<?php
namespace FwTest\Controller;
use FwTest\Classes as Classes;

class AjaxController extends AbstractController
{
    /**
     * @Route('/ajax_delete_product.php')
     */
    public function deleteProduct()
    {
    	$db = $this->getDatabaseConnection();

        $id = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : 0;
//echo $id;exit;
        $return['success'] = false;

        if ($id > 0) {
            $product = new Classes\Product($db, $id);
            $deleted = $product->delete();
//echo $deleted;exit;
            $return['success'] = $deleted;
        }

        echo json_encode($return['success']);
        exit;
    }
}