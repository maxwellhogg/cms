<?php

require __DIR__ . '/inc/all.inc.php';

$page = @(string) ($_GET['page'] ?? 'index');

if ($page === 'index') {
    $pagesRepository = new \App\Repository\PagesRepository($pdo);
    $pagesRepository->fetchBySlug('index');

    $pagesController = new \App\Frontend\Controller\PagesController();
    $pagesController->showPage('index');
} else {
    $notFoundController = new \App\Frontend\Controller\NotFoundController();
    $notFoundController->error404();
}