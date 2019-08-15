<?php
/*
Title: Direccion
Tab: Datos Extra
Flow: Datos Usuario
Post Type: user
Order: 30
*/

   piklist('field', array(
    'type' => 'group'
    ,'label' => __('Dirección', 'imgd')
    ,'fields' => array(
      array(
        'type' => 'text'
        ,'field' => 'imgd_user_address'
        ,'label' => __('Street Address', 'imgd')
        ,'columns' => 12
      )
      ,array(
        'type' => 'text'
        ,'field' => 'imgd_user_city'
        ,'label' => __('City', 'imgd')
        ,'columns' => 5
      )
      ,array(
        'type' => 'text'
        ,'field' => 'imgd_user_state'
        ,'label' => __('Estado / Provincia', 'imgd')
        ,'columns' => 4
        ,'choices' => ''
      ) 
    ,array(
      'type' => 'select'
      ,'field' => 'imgd_user_country'
      ,'label' => __('País', 'imgd')
      ,'attributes' => array(
        'class' => 'text'
      )
      ,'columns' => 3
      ,'value'=> 54
      ,'choices' => array(
          '' => __('Seleccione un País', 'imgd')
          ) + imgd_paises()
      )
      ,array(
        'type' => 'text'
        ,'field' => 'imgd_user_postal_code'
        ,'label' => __('Postal Code', 'imgd')
        ,'columns' => 4
      )
    )
  ));