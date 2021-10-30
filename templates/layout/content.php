<?php
	$d->reset();
	$sql="select ten,maso,xuatxu,gia,photo,tenkhongdau from #_tour where hienthi=1";
	$d->query($sql);
	$result=$d->result_array();
	$count=count($result);
    ?>
    <div id="info">
                	<div class="title">SẢN PHẨM MỚI</div>
                    <div class="content">
                    <?php
						for($i=0;$i<$count;$i++)
						{
                    		echo "<div class='sp'>";
                        	echo "<div class='hinh'><a href='#'><img src='images/".$result[$i]['photo']."' width='100px' /></a></div>";
                           	echo "<div class='ten'>".$result[$i]['ten']."</div>";
                        	echo "<div class='ma'>Mã: <span>".$result[$i]['maso']."</span></div>";
                        	echo "<div class='xx'>".$result[$i]['xuatxu']."</div> "; 
                        	echo "<div class='gia'>Giá: <span>".$result[$i]['gia']."</span></div>";
							echo "</div>";
						}?>
							<div class="clear"></div>
							  <div id="phantrang">						  
							<a href='#' visited>1</a>;<a href='#'>2</a>;<a href='#'>3</a>;
							<a href='#'>4</a>;<a href='#'>5</a>;<a href='#'>6</a>;<a href='#'>7</a>;  
                            <span>...</span><a href='#'>199</a>;<a href='#'>200</a>;<a href='#'><img src="images/next.png" /></a>;                        
							}
                       </div>
                    </div>
                     
                    </div>
                </div>