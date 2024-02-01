<?php
class CoreController
{

    public function loadView($viewName, $data = [])
    {
        extract($data);
        include_once '../app/Views/layout_user_header.php';
        include_once '../app/Views/' . $viewName . '.php';
        include_once '../app/Views/layout_user_footer.php';
    }
    public function loadViewAdmin($viewName, $data = [])
    {
        extract($data);
        include_once '../app/Views/layout_admin_header.php';
        include_once '../app/Views/' . $viewName . '.php';
        include_once '../app/Views/layout_admin_footer.php';
    }

    public function loadModel($modelName)
    {
        // PHP 7 :
        $model = $modelName . "Model";
        return new $model();
        // PHP 8 :
        // return new ($modelName . "Model")();
    }
}
?>
<!--  -->