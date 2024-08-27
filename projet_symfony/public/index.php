<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

echo 'test'; // Ajoutez cette ligne pour afficher "test" 
exit;       // Arrête l'exécution du script ici

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
