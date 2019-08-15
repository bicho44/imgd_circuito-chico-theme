<?php
/**
* Filtro del wp_link_pages para que funcione con el formato Bootstrap 3.x
*
* @link: https://gist.github.com/ebinnion/7635465
*/
add_filter('wp_link_pages', 'bootstrap_wp_link_pages');
function bootstrap_wp_link_pages($wp_links){
	global $post;

	// Generate current page base url without pagination.
	$post_base = trailingslashit( get_site_url(null, $post->post_name) );

	$wp_links = trim(str_replace(array('<p>Pages: ', '</p>'), '', $wp_links));

	// Get out of here ASAP if there is no paging.
	if ( empty($wp_links) )
		return '';

	// Split on spaces
	$splits = explode(' ', $wp_links );
	$links = array();
	$current_page = 1;

	// Since links are now split up such that <a and href=".+" are seperate...
	// loop over split array and correct links.
	foreach( $splits as $key => $split ){
		if( is_numeric($split) ) {
			$links[] = $split;
			$current_page = $split;
		} else if ( strpos($split, 'href') === false ) {
			$links[] = $split . ' ' . $splits[$key + 1];
		}
	}

	$num_pages = count($links);

	// Output pagination
	$output = '';
	$output .= '<ul class="pagination">';

	$output .= "<li><a href=\"{$post_base}\">&lt;&lt;</a></li>";

	if ( $current_page == 1 )
		$output .= '<li class="disabled"><a>';
	else
		$output .= '<li><a href="' . $post_base . ($current_page - 1) . '">';

	$output .= '&lt;</a></li>';	// end the li. No reason to duplicated this in both conditionals.

	foreach( $links as $key => $link ) {
		if ( is_numeric($link) ) {
			$temp_key = $key + 1;
			$output .= "<li class=\"active\"><a href=\"{$post_base}{$temp_key}\">{$temp_key}</a></li>";
		}
		else {
			$output .= "<li>{$link}</li>";
		}
	}

	if ( $current_page == $num_pages )
		$output .= '<li class="disabled"><a>';
	else
		$output .= '<li><a href="' . $post_base . ($current_page + 1) . '">';

	$output .= '&gt;</a></li>';	// end the li. No reason to duplicated this in both conditionals.

	$output .= "<li><a href=\"{$post_base}{$num_pages}\">&gt;&gt;</a></li>";

	$output .= '</ul>';

	return $output;
}


/**
* Bootstrap pagination function
* @link: https://gist.github.com/ebinnion/7635465
*/

function wp_bs_pagination($pages = '', $range = 4)

{

     $showitems = ($range * 2) + 1;
     global $paged;

     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
    global $wp_query;
		 $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }



     if(1 != $pages)

     {

        echo '<div class="text-center">';
        echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";

         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";



         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>

    </li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";

             }

         }



         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";

         echo "</ul></nav>";
         echo "</div>";
     }

}
