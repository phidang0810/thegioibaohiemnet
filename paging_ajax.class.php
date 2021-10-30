<?php
class paging_ajax
{
    public $data; // Data display
    public $per_page = 5; // Per page
    public $page; // Current page
    public $text_sql; // Text sql command
    public $show_pagination = true;
    public $show_goto = true;
    public $show_total = true;
    
    public $class_pagination; 
    public $class_active;
    public $class_inactive;
    public $class_go_button;
    public $class_text_total;
    public $class_txt_goto;
    
    
    
    
    private $cur_page;
    private $num_row;
    
    public function GetResult()
    {
        global $db;
        
        $this->cur_page = $this->page;
        $this->page -= 1;
        $this->per_page = $this->per_page;

        $start = $this->page * $this->per_page;
        
        // Calc total records
        $db->query($this->text_sql);
        $this->num_row = $db->num_rows();
        // Get result current page
        return $db->query($this->text_sql." LIMIT $start, $this->per_page");
    }
    
    public function Load()
    {
        
        if(!$this->show_pagination)
            return $this->data;
        
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;    
        
        $msg = $this->data;

        /* --------------------------------------------- */
        
        $count = $this->num_row;
        $no_of_paginations = ceil($count / $this->per_page);
        
        /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
        if ($this->cur_page >= 7) {
            $start_loop = $this->cur_page - 3;
            if ($no_of_paginations > $this->cur_page + 3)
                $end_loop = $this->cur_page + 3;
            else if ($this->cur_page <= $no_of_paginations && $this->cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
        /* ----------------------------------------------------------------------------------------------------------- */
        
        $msg .= "<div class='$this->class_pagination'><ul>";
        
        // FOR ENABLING THE FIRST BUTTON
        if ($first_btn && $this->cur_page > 1) {
            $msg .= "<li p='1' class='active'>Đầu</li>";
        } else if ($first_btn) {
            $msg .= "<li p='1' class='$this->class_inactive'>Đầu</li>";
        }
    
        // FOR ENABLING THE PREVIOUS BUTTON
        if ($previous_btn && $this->cur_page > 1) {
            $pre = $this->cur_page - 1;
            $msg .= "<li p='$pre' class='active'>Trước</li>";
        } else if ($previous_btn) {
            $msg .= "<li class='$this->class_inactive'>Cuối</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {
        
            if ($this->cur_page == $i)
                $msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
            else
                $msg .= "<li p='$i' class='active'>{$i}</li>";
        }
        
        // TO ENABLE THE NEXT BUTTON
        if ($next_btn && $this->cur_page < $no_of_paginations) {
            $nex = $this->cur_page + 1;
            $msg .= "<li p='$nex' class='active'>Sau</li>";
        } else if ($next_btn) {
            $msg .= "<li class='$this->class_inactive'>Sau</li>";
        }
        
        // TO ENABLE THE END BUTTON
        if ($last_btn && $this->cur_page < $no_of_paginations) {
            $msg .= "<li p='$no_of_paginations' class='$this->class_inactive'>Cuối</li>";
        } else if ($last_btn) {
            $msg .= "<li p='$no_of_paginations' class='$this->class_inactive'>Cuối</li>";
        }
        
        if($this->show_goto)
            $goto = "<input type='text' id='goto' class='$this->class_txt_goto' size='1' style='margin-top:-1px;margin-left:40px;margin-right:10px'/><input type='button' id='go_btn' class='$this->class_go_button' value='Đến'/>";
        if($this->show_total)
            $total_string = "<span id='total' class='$this->class_text_total' a='$no_of_paginations'>Trang <b>" . $this->cur_page . "</b>/<b>$no_of_paginations</b></span>";
        $stradd =  $goto . $total_string;
        
        return $msg . "</ul>" . $stradd . "</div>";  // Content for pagination
    }     
            
}

?>