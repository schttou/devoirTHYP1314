<?php
// module/Etudiant/conï¬�g/module.config.php:
// module/Etudiant/conï¬�g/module.conï¬�g.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Etudiant\Controller\Etudiant' => 'Etudiant\Controller\EtudiantController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'etudiant' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/etudiant[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Etudiant\Controller\Etudiant',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'etudiant' => __DIR__ . '/../view',
        ),
    ),
);