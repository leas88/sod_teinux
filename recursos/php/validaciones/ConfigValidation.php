<?php
$alumnosVal = array(
        [
            'fieldKey'=>'nombre2',
            'fieldText'=>'Nombre',
            'rules' =>'alpha_accent_space',
        ],
        [
            'fieldKey'=>'telefono2',
            'fieldText'=>'Teléfono',
            'rules' =>'required|max_length[10]',
        ],
        [
            'fieldKey'=>'correo2',
            'fieldText'=>'Correo Electrónico',
            'rules' =>'required|valid_email',
        ]
);

