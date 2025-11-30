<?php

namespace App\Support;

class View
{
    public static function render(string $template, array $data = []): string
    {
        $viewPath = __DIR__ . '/../../resources/views/' . $template . '.php';

        if (!file_exists($viewPath)) {
            return 'View not found: ' . htmlspecialchars($template, ENT_QUOTES, 'UTF-8');
        }

        extract($data);

        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
}
