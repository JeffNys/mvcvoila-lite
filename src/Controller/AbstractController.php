<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    /**
     * @var Environment
     */
    protected $twig;


    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        if (APP_PROD) {
            $this->twig = new Environment($loader);
        } else {
            $this->twig = new Environment($loader, [
                "debug" => true,
                ]);
        }
        $this->twig->addExtension(new DebugExtension());
    }
}
