<?php 
if($_POST["[page"])
{
require_once "paging_ajax.class.php";
$paging = new paging_ajax();

// Init style (custiom style paging)
$paging->class_pagination = "pagination";
$paging->class_active = "active";
$paging->class_inactive = "inactive";
$paging->class_go_button = "go_button";
$paging->class_text_total = "total";
$paging->class_txt_goto = "txt_go_button";

// Init paging
    $paging->per_page = 4;
    $paging->page = $_POST["page"];
    $paging->text_sql = "SELECT id,message from records";
    // Get Result
    $result_pag_data = $paging->GetResult();
// Create result data
$msg = "";
while ($row = mysql_fetch_array($result_pag_data)) {
$htmlmsg=htmlentities($row['message']);
    $msg .= "<li><b>" . $row['id'] . "</b> " . $htmlmsg . "</li>";
}

// Assign data to ajax_paging class
    $paging->data = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data    
    echo $paging->Load();  // Output
} // end if post 
?>