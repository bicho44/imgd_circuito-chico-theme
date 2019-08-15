<?php
/*
Title: Foto Usuario
Tab: Datos Extra
Flow: Datos Usuario
Post Type: user
Order: 10
*/

piklist('field', array(
    'type' => 'file'
    ,'field' => 'imgd_user_picture' // Use these field to match WordPress featured images.
    ,'scope' => 'user_meta'
    ,'options' => array(
        'title' => __('Imagen de Usuario', 'imgd')
        ,'button' => __('Imagen de usuario', 'imgd')
    )
));

piklist(
    'field', 
    array(
        'type' => 'text'
        ,'field' => 'imgd_user_medio'
        ,'value' => ''
        ,'label' => __('Medio al que representa', 'imgd')
    )
);

piklist('field', array(
    'type' => 'datepicker'
    ,'field' => 'imgd_user_cumple'
    ,'label' => __('Cumpleaños', 'piklist-demo')
    ,'description' => __('Seleccione una fecha de cumpleaños', 'piklist-demo')
    ,'options' => array(
      'dateFormat' => 'd/m/y'
    )
    ,'attributes' => array(
      'size' => 12
    )
    ,'value' => date('d/m/y', time() + 604800)
  )
);