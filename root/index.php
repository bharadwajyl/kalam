<?php
// DB table to use
$table = <<<EOT
 (
    SELECT crm_lead_master_data.Lead_ID, crm_lead_master_data.Name, crm_lead_master_data.Mobile, crm_lead_master_data.Alternate_Mobile, crm_lead_master_data.Whatsapp, crm_lead_master_data.Email, crm_lead_master_data.Interested_In, crm_lead_master_data.Source, crm_lead_master_data.Status, crm_lead_master_data.DOR, crm_admin.DOR as summary_DOR, crm_admin.Name as Caller, crm_lead_master_data.State, crm_lead_master_data.City FROM crm_lead_master_data INNER JOIN crm_calling_status ON crm_lead_master_data.Caller_ID = crm_lead_master_data.Caller_ID INNER JOIN crm_admin ON crm_lead_master_data.Caller_ID = crm_admin.Admin_ID GROUP BY Lead_ID
 ) temp
EOT;
 
// Table's primary key
$primaryKey = 'Lead_ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
   array( 'db' => 'Lead_ID',          'dt' => 0 ),
   array( 'db' => 'Name',        'dt' => 1 ),
   array( 'db' => 'Mobile', 'dt' => "mobile" ),
   array( 'db' => 'Email', 'dt' => "email" ),
   array( 'db' => 'Email', 'dt' => "whatsapp" ),
   array( 'db' => 'State', 'dt' => "state" ),
   array( 'db' => 'State', 'dt' => "city" ),
   array( 'db' => 'Interested_In', 'dt' => 4 ),
   array( 'db' => 'Source', 'dt' => 5 ),
   array( 'db' => 'Status', 'dt' => 6 ),
   array( 'db' => 'DOR', 'dt' => 7 ),
   array( 'db' => 'summary_DOR', 'dt' => 8 ),
   array( 'db' => '', 'dt' => 9 ),
   array( 'db' => 'Caller', 'dt' => 10 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
