<?php

namespace WSU\Customizer_Capabilities;

add_filter( 'map_meta_cap', 'WSU\Customizer_Capabilities\add_customizer_to_editors', 10, 3 );

function add_customizer_to_editors( $caps, $cap, $user_id ) {
	if ( 'customize' === $cap && user_can( $user_id, 'publish_pages' ) ) {
		$caps = array( 'publish_pages' );
	}

	return $caps;
}
