<?php

function render(string $path, array $data = []): string
{
    $loader = new \Twig\Loader\FilesystemLoader('../app/Views/AdminLTE/');
    $twig = new \Twig\Environment($loader);

    user_id();

    $templateData = [
        'data' => $data,
    ];

    return $twig->render("page/{$path}", $templateData);
}