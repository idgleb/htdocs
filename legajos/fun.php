
<?php



function getEmpleados()
{


    $lista = [
        [
            'legajo' => '10001',
            'avatar' => 'personajes03-01.png',
            'nombre' => 'Juana',
            'apellido' => 'Pascual'
        ],
        [
            'legajo' => '10002',
            'avatar' => 'personajes03-02.png',
            'nombre' => 'Midori',
            'apellido' => 'Fujioka'
        ],
        [
            'legajo' => '10003',
            'avatar' => 'personajes03-03.png',
            'nombre' => 'Agustina',
            'apellido' => 'Rodríguez'
        ],
        [
            'legajo' => '10004',
            'avatar' => 'personajes03-04.png',
            'nombre' => 'Juan Martín',
            'apellido' => 'Martínez'
        ],
        [
            'legajo' => '10005',
            'avatar' => 'personajes03-05.png',
            'nombre' => 'Tomás',
            'apellido' => 'Cipriani'
        ],
        [
            'legajo' => '10006',
            'avatar' => 'personajes03-06.png',
            'nombre' => 'Mariano',
            'apellido' => 'Abranzon'
        ],
        [
            'legajo' => '10007',
            'avatar' => 'personajes03-07.png',
            'nombre' => 'Fabiana',
            'apellido' => 'Páez'
        ],
        [
            'legajo' => '10008',
            'avatar' => 'personajes03-08.png',
            'nombre' => 'Luis',
            'apellido' => 'Gallego'
        ],
        [
            'legajo' => '10009',
            'avatar' => 'personajes03-09.png',
            'nombre' => 'Gabriela',
            'apellido' => 'Olivieri'
        ],
        [
            'legajo' => '10010',
            'avatar' => 'personajes03-10.png',
            'nombre' => 'Joana',
            'apellido' => 'Rivero'
        ],
        [
            'legajo' => '10011',
            'avatar' => 'personajes03-11.png',
            'nombre' => 'Jonathan',
            'apellido' => 'Bravo'
        ],
        [
            'legajo' => '10012',
            'avatar' => 'personajes03-12.png',
            'nombre' => 'Francisco',
            'apellido' => 'Sabatino'
        ]
    ];


    return $lista;
}

function getEmpleoPorLegajo($legajo = null)
{

    $empleados = getEmpleados();
    $epmleadoPorLegajo = null;
    $items = 0;
    while (!$epmleadoPorLegajo && $items < count($empleados)) {
        echo $items. " , ";
        if ($legajo == $empleados[$items]['legajo']) $epmleadoPorLegajo[] = $empleados[$items];
        $items++;
    }

    return $epmleadoPorLegajo;
}


?>