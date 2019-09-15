<?php
$alumnosVal = array(
        [
            'fieldKey'=>'nombre2',
            'fieldText'=>'Nombre',
            'rules' =>'max_length[8]',
        ],
        [
            'fieldKey'=>'telefono2',
            'fieldText'=>'Teléfono',
            'rules' =>'required',
        ],
        [
            'fieldKey'=>'correo2',
            'fieldText'=>'Correo Electrónico',
            'rules' =>'required|valid_email',
        ]
);
