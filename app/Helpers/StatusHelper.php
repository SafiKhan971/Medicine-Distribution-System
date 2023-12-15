<?php
if ( !function_exists( 'statusLabel' ) ) {
    function statusLabel( $status ) {
        return $status == 0 ? 'Unapproved' : 'Approved';
    }
}
