<?php

piklist(
    'field', 
    array(
        'type' => 'text'
        ,'field' => 'imgd_asoc_widget_title'
        ,'value' => ''
        ,'label' => __('Titulo', 'imgd')
    )
);

//piklist::pre(get_editable_roles());

piklist('field', array(
'type' => 'select'
,'field' => 'imgd_asoc_widget_roles'
,'choices' =>  piklist(
              get_editable_roles()
               ,array(
                 'name','name'
               )
)
));

piklist (
    'field',
    array(
        'type' => 'radio',
        'field' => 'imgd_asoc_widget_thumb',
        'label' => __('Muestra el Thumbnail', 'imgd'),
        'value' => 0,
        'attributes' => array(
            'class' => 'radio'
        ),
        'choices' => array(
            0 => __('No', 'imgd'),
            1 => __('Si', 'imgd')
        ),
        'position' => 'wrap'
    )
);

piklist (
    'field',
    array(
        'type' => 'radio',
        'field' => 'imgd_asoc_widget_thumb_format',
        'label' => __('Formato del Thumbnail', 'imgd'),
        'value' =>  'img-square' ,
         'attributes' => array (
            'class' => 'radio'
        ),
        'choices' => array(
            'img-square' => __('Cuadrado', 'imgd'),
             'img-circle' => __('Redondo', 'imgd')
        ),
        'conditions' => array(
                    array(
                        'field' => 'imgd_asoc_widget_thumb'
                        , 'value' => 1
                    )
                )
    )
);

piklist('field', array(
    'type' => 'select'
    ,'field' => 'imgd_asoc_widget_thumb_sizes'
    , 'label' => __('Tamaño del Thumbnail', 'imgd')
    ,'choices' =>  get_intermediate_image_names()
    ,'value' => 'stamp'
    ,'conditions' => array(
                        array(
                            'field' => 'imgd_asoc_widget_thumb'
                            , 'value' => 1
                        )
        )
    )
);
?>


<ul>
    <li>Cantidad a mostrar</li>
    <li>Link a listado de notas</li>
    <li>Link a Listado de Asociados</li>
    <li>Orden por de asociados mas Activos</li>
</ul>

