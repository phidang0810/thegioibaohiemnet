<?php 
include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."function_user.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
    $id = $_GET['id']; 
    $page = $_GET['page']; 
	$d->reset();
    $sql = "select * from table_tour"; 
	$d->query($sql);
    $result = $d->result_query($sql); 
    $tongsorecord = mysql_num_rows($result); 
    $y = 1; 
    $start = ($page-1)*$y; 
    $tongsotrang = ceil($tongsorecord/$y); 
    if($tongsorecord == 0){ 
        echo "Không có tin nào";     
    }else{ 
    ?> 
    <script language="javascript" src="ajax.js"></script> 
        <table align="center"> 
            <tr> 
                <td class="title">STT</td> 
                <td class="title">Tiêu đề</td> 
                <td class="title">Hình</td> 
            </tr> 
    <?php 
        $stt = 0; 
        $sql1 = "select * from tour limit $start,$y"; 
        $result1 = mysql_query($sql1); 
        while($data1 = mysql_fetch_array($result1)){ 
            $stt++; 
            echo "<tr>"; 
            echo "<td>$stt</td>"; 
            echo "<td>$data1[id]</td>"; 
            echo "<td><img src='data/$data1[id]' title='$data1[id]' /></td>"; 
            echo "</tr>";     
        } 
    } 
?> 
    <tr> 
        <td colspan="3"> 
        <div id="pt"> 
        <?php 
            for($i=1;$i<=$tongsotrang;$i++){ 
                if($i == $page){ 
                 echo "<span class='active'>$i</span>";     
                }else{ 
                    echo "<a href='#' onclick='javascript:loadXMLDoc($id,$i);'>$i</a>";     
                } 
            } 
        ?> 
        </div> 
        </td> 
    </tr> 
</table>