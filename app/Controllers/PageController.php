<?php
class PageController extends CoreController
{

    public function index()
    {
        // Load model
        $product = $this->loadModel('Product');
        $data['listProduct'] = $product->getAllProducts();
        $data['pd_FlashSale'] = $product->getProductsFlashSale();
        // Load view
        $this->loadView('page_index', $data);
    }
    public function contact()
    {
        // load model
        // load view
        $this->loadView('page_contact');
    }
    public function about()
    {
        // load model
        // load view
        $this->loadView('page_about');
    }
}
?>
<!--  -->