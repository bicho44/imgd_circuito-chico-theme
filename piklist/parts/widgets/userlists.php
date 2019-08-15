<?php
/*
Title: Listado de Asociados
Description: Lista de Asociados y su contacto
*/

$country = imgd_paises();
$displayrole = $settings['imgd_asoc_widget_roles'];

if(!isset($displayrole)) { $displayrole = 'author';}
$title = $settings['imgd_asoc_widget_title'];

?>
<?php echo $before_widget; ?>
 
<?php echo $before_title; ?>
 <?php if(isset($title)) {echo '<a href="#">'.$title.'</a>';}?>
<?php echo $after_title; ?>
<?php 
$blogusers = get_users( array( 
    'role' => $displayrole
 ) );
 ?>
  <?php 
/*$blogusers = get_users( array( 
    'role' => 'Administrator'
 ) );*/?>
<?php 
// Array of stdClass objects.
foreach ( $blogusers as $user ) {
    $thumbnail_id = 0;
    $slider_size = $settings['imgd_asoc_widget_thumb_sizes'];
    
    $class = $settings['imgd_asoc_widget_thumb_format'][0];
    $metas = get_user_meta( $user->id);

    $state = "";
    if ($metas['imgd_user_state'][0]!="") {$state = $metas['imgd_user_state'][0] . ',';}
    $usercountry ="";
    if($metas['imgd_user_country'][0]!='') {$usercountry = '<strong>'.$country[$metas['imgd_user_country'][0]].'</strong>';}
    $ubicacion = $state.$usercountry;

    $phones = rtrim(implode(',', $metas['imgd_user_phone']), ',');
    $cels = rtrim(implode(',', $metas['imgd_user_cel']), ',');
?>
    <div class="media">
    <?php if ($settings['imgd_asoc_widget_thumb'][0]!=0){?>
        <div class="media-left">
        <?php
            $thumbnail_id =  $metas['imgd_user_picture'][0];
            if($thumbnail_id!=0) {
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, $slider_size , true );
                if($thumbnail_url){?>
                    <img class="media-object <?php echo $class;?>" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $user->display_name;?>">
                <?php }
            }
       ?>
        </div>
    <?php  } ?>
        <div class="media-body">
            <h4 class="media-heading">
                <a href="mailto:.<?php echo $user->user_email;?>"><?php echo esc_html( $user->display_name );?></a>
            </h4>
            <?php echo $ubicacion;?>
            <br>
            <?php if($phones) {echo '('.$metas['imgd_user_country'][0].') '.$phones;}?>
            <?php if($cels) {echo '('.$metas['imgd_user_country'][0].') '.$cels;}?>
        </div>
    </div>

<?php } // End Foreach?>
<?php echo $after_widget; ?>