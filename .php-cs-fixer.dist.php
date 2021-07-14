<?php
return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->in(__DIR__.'/app')
        ->in(__DIR__.'/tests')
    )
;
