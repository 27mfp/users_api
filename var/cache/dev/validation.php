<?php

// This file has been auto-generated by the Symfony Cache Component.

return [[

'App.Entity.User' => 0,

], [

0 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            (($f = &\Symfony\Component\VarExporter\Internal\Registry::$factories)['Symfony\\Component\\Validator\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::f('Symfony\\Component\\Validator\\Mapping\\ClassMetadata'))(),
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntity'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntity')),
            ($f['Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::f('Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'))(),
            clone ($p['Symfony\\Component\\Validator\\Constraints\\Email'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Validator\\Constraints\\Email')),
            clone ($p['Symfony\\Component\\Validator\\Constraints\\NotBlank'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Validator\\Constraints\\NotBlank')),
            clone $p['Symfony\\Component\\Validator\\Constraints\\Email'],
            $f['Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'](),
            clone $p['Symfony\\Component\\Validator\\Constraints\\NotBlank'],
            $f['Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'](),
            clone $p['Symfony\\Component\\Validator\\Constraints\\NotBlank'],
            $f['Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'](),
            clone $p['Symfony\\Component\\Validator\\Constraints\\NotBlank'],
            $f['Symfony\\Component\\Validator\\Mapping\\PropertyMetadata'](),
            clone $p['Symfony\\Component\\Validator\\Constraints\\NotBlank'],
        ],
        null,
        [
            'stdClass' => [
                'constraints' => [
                    [
                        $o[1],
                    ],
                    2 => [
                        $o[3],
                        $o[4],
                        $o[5],
                    ],
                    6 => [
                        $o[7],
                    ],
                    8 => [
                        $o[9],
                    ],
                    10 => [
                        $o[11],
                    ],
                    12 => [
                        $o[13],
                    ],
                ],
                'constraintsByGroup' => [
                    [
                        'Default' => [
                            $o[1],
                        ],
                        'User' => [
                            $o[1],
                        ],
                    ],
                    2 => [
                        'Default' => [
                            $o[3],
                            $o[4],
                            $o[5],
                        ],
                        'User' => [
                            $o[3],
                            $o[4],
                            $o[5],
                        ],
                    ],
                    6 => [
                        'Default' => [
                            $o[7],
                        ],
                        'User' => [
                            $o[7],
                        ],
                    ],
                    8 => [
                        'Default' => [
                            $o[9],
                        ],
                        'User' => [
                            $o[9],
                        ],
                    ],
                    10 => [
                        'Default' => [
                            $o[11],
                        ],
                        'User' => [
                            $o[11],
                        ],
                    ],
                    12 => [
                        'Default' => [
                            $o[13],
                        ],
                        'User' => [
                            $o[13],
                        ],
                    ],
                ],
                'name' => [
                    'App\\Entity\\User',
                    2 => 'email',
                    6 => 'name',
                    8 => 'phone_number',
                    10 => 'bio',
                    12 => 'city',
                ],
                'defaultGroup' => [
                    'User',
                ],
                'members' => [
                    [
                        'email' => [
                            $o[2],
                        ],
                        'name' => [
                            $o[6],
                        ],
                        'phone_number' => [
                            $o[8],
                        ],
                        'bio' => [
                            $o[10],
                        ],
                        'city' => [
                            $o[12],
                        ],
                    ],
                ],
                'properties' => [
                    [
                        'email' => $o[2],
                        'name' => $o[6],
                        'phone_number' => $o[8],
                        'bio' => $o[10],
                        'city' => $o[12],
                    ],
                ],
                'groups' => [
                    1 => [
                        'Default',
                        'User',
                    ],
                    3 => [
                        'Default',
                        'User',
                    ],
                    [
                        'Default',
                        'User',
                    ],
                    [
                        'Default',
                        'User',
                    ],
                    7 => [
                        'Default',
                        'User',
                    ],
                    9 => [
                        'Default',
                        'User',
                    ],
                    11 => [
                        'Default',
                        'User',
                    ],
                    13 => [
                        'Default',
                        'User',
                    ],
                ],
                'fields' => [
                    1 => [
                        'email',
                    ],
                ],
                'class' => [
                    2 => 'App\\Entity\\User',
                    6 => 'App\\Entity\\User',
                    8 => 'App\\Entity\\User',
                    10 => 'App\\Entity\\User',
                    12 => 'App\\Entity\\User',
                ],
                'property' => [
                    2 => 'email',
                    6 => 'name',
                    8 => 'phone_number',
                    10 => 'bio',
                    12 => 'city',
                ],
                'message' => [
                    3 => 'The email "{{ value }}" is not a valid email.',
                ],
                'mode' => [
                    3 => 'loose',
                ],
            ],
        ],
        $o[0],
        []
    );
},

]];
