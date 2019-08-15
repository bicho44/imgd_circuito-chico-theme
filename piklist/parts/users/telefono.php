<?php
/*
Title: Contactos
Tab: Datos Extra
Flow: Datos Usuario
Post Type: user
Order: 20
*/


piklist('field', array(
    'type' => 'group'
    ,'label' => __('Contactos', 'imgd')
    ,'fields' => array(
      array(
        'type' => 'tel'
        ,'field' => 'imgd_user_phone'
        ,'label' => __('Tel', 'imgd')
        ,'add_more' => true
        ,'value' => 0
        ,'columns'=>6
      )
      ,array(
        'type' => 'tel'
        ,'field' => 'imgd_user_cel'
        ,'label' => __('Cel', 'imgd')
        ,'add_more' => true
        ,'value' => 0
        ,'columns'=>6
      )
      )
  )
);