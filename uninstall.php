<?php

// If uninstall not called from WordPress exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit ();

// Delete option from options table
delete_option( 'roojoom_settings' );

// Delete option from the database in multisite
delete_site_option( 'roojoom_settings' );
