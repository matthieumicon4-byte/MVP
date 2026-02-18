<?php
namespace App\Core;

class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);

        $viewPath = BASE_PATH . '/app/Views/' . $view . '.php';
        $layoutPath = BASE_PATH . '/app/Views/Layout.php';

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        require $layoutPath;
    }
}
