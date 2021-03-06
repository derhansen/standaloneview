<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Set language of a Fluid StandaloneView for backend context',
    'description' => 'Demonstrate how to control the language used in a Fluid StandaloneView when rendering the view in the TYPO3 backend context',
    'category' => 'plugin',
    'author' => 'Torben Hansen',
    'author_email' => 'derhansen@gmail.com',
    'state' => 'experimental',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '0.3.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '7.6.0-8.7.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
