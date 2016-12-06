<?php

class tool_page {

    /**
     * 页面输出结果
     *
     * @var string
     */
    var $output = '';

    /**
     * 使用该类的文件,默认为 PHP_SELF
     *
     * @var string
     */
    var $file;

    /**
     * 页数传递变量，默认为 'p'
     *
     * @var string
     */
    var $page_var = "p";

    /**
     * 页面大小,每页显示多少个记录
     *
     * @var integer
     */
    var $num_per_page = 10;

    /**
     * 当前页面
     *
     * @var ingeger
     */
    var $current_page;

    /**
     * 要传递的变量数组
     *
     * @var array
     */
    var $var_str;

    /**
     * 总页数
     *
     * @var integer
     */
    var $total_pages;

    /**
     * LIMIT 语句中的offset
     *
     * @var integer
     */
    var $offset = 0;

    /**
     * 分页显示几个链接 如:第 1 2 3 4 5 6 7 8 页
     *
     * @var integer
     */
    var $link_num = 8;
    var $prev_page = 0;
    var $prev_page_url = '';
    var $next_page = 0;
    var $next_page_url = '';
    //标识页面跳转时是否使用js跳转, 默认为不使用js跳转
    var $script_jump = false;

    /**
     * 分页设置
     *
     * @access public
     * @param int $num_per_page 页面大小
     * @param int $record_nums    总记录数
     * @param int $current  当前页数，默认会自动读取
     * @return void
     */
    function set($record_nums, $current_page = false, $unit = '条记录') {

        if (!$current_page) {
            $current_page = (isset($_GET[$this->page_var]) && is_numeric($_GET[$this->page_var]) && $_GET[$this->page_var] > 0) ? intval($_GET[$this->page_var]) : ((isset($_POST[$this->page_var]) && is_numeric($_POST[$this->page_var]) && $_POST[$this->page_var] > 0) ? intval($_POST[$this->page_var]) : 1);
        }
        if ($current_page == 0) {
            $current_page = 1;
        } else {
            $current_page = floor($current_page);    // 防止有人故意捣乱
        }

        if ($current_page > 0) {
            $total_pages = ($record_nums > 0) ? ceil($record_nums / $this->num_per_page) : 1; //总页数
            if ((int) $current_page > $total_pages) { // 防止有人故意将页数输入太大
                $current_page = $total_pages;
            }
            $current_page = floor($current_page);    // 防止有人故意捣乱
            $offset = ($current_page - 1) * $this->num_per_page;
        } else {    // 无翻页参数则默认为第1页
            $offset = 0;
            $current_page = 1;
            $total_pages = 1;
        }


        $this->current_page = $current_page;
        $this->offset = $offset;
        $this->total_pages = $total_pages;

        if ($record_nums == 0 || $total_pages == 1) {
            $this->output = '';
            return;
        }
        if (!$this->file) {
            $this->file = $_SERVER['PHP_SELF'];
        }

        $start = ($current_page - round($this->link_num / 2)) > 0 ? ($current_page - round($this->link_num / 2)) : 1;
        $end = ($current_page + round($this->link_num / 2)) < $total_pages ? ($current_page + round($this->link_num / 2)) : $total_pages;
        if ($current_page < round($this->link_num / 2)) {
            $end = ( $this->link_num > $total_pages ) ? $total_pages : $this->link_num;
        }

        if ($current_page != 1) {
            $this->prev_page = $current_page - 1;
            $this->prev_page_url = $this->file . '?' . $this->page_var . '=' . $this->prev_page . ($this->var_str);
        } elseif ($current_page = 1) {
            $this->prev_page = 0;
            $this->prev_page_url = '';
        }
        //查询中可能有汉字, 做转码
        $temp = explode('&amp;', $this->var_str);
        $temp = array_map('urlencode', $temp);
        $this->var_str = implode('&', $temp);
        $this->var_str = str_replace('%3D', '=', $this->var_str);
        ;
        unset($temp);

        if ($this->prev_page) {
            //判断是否使用js跳转
            if ($this->script_jump) {
                //js回调传入一个参数，是$this->page_var . '='.($current_page-1).$this->var_str,标识提交的参数
                $this->output .= '<a href="javascript:pageCallback(\'' . $this->page_var . '=' . ($current_page - 1) . $this->var_str . '\');" class=nextprev>上一页</a>';
            } else {
                //页面跳转
                $this->output .= '<a href="' . $this->file . '?' . $this->page_var . '=' . ($current_page - 1) . ($this->var_str) . '" target="_self" class=nextprev>上一页</a>';
            }
        } else {
            $this->output .= '<span class=nextprev>上一页</span>';
        }

        $page_list_ary = array();
        for ($t = $start; $t <= $end; $t++) {
            if ($this->script_jump) {
                $page_list_ary[] = ($current_page == $t) ? '<a class=current><font  color="red"><b>' . $t . '</b></font></a>' : '<a class=p_num href="javascript:pageCallback(\'' . $this->page_var . '=' . $t . ($this->var_str) . '\');">' . $t . '</a>';
            } else {
                $page_list_ary[] = ($current_page == $t) ? '<a class=current><font  color="red"><b>' . $t . '</b></font></a>' : '<a class=p_num href="' . $this->file . '?' . $this->page_var . '=' . $t . ($this->var_str) . '" target="_self">' . $t . '</a>';
            }
        }
        $this->output .= implode('', $page_list_ary);

        if ($current_page != $total_pages) {
            $this->next_page = $current_page + 1;
            $this->next_page_url = $this->file . '?' . $this->page_var . '=' . $this->next_page . ($this->var_str);
        } elseif ($current_page = $total_pages) {
            $this->next_page = 0;
            $this->next_page_url = '';
        }
        if ($this->next_page) {
            if ($this->script_jump) {
                $this->output .= '<a href="javascript:pageCallback(\'' . $this->page_var . '=' . ($current_page + 1) . ($this->var_str) . '\');" class=nextprev>下一页</a>';
            } else {
                $this->output .= '<a href="' . $this->file . '?' . $this->page_var . '=' . ($current_page + 1) . ($this->var_str) . '" target="_self" class=nextprev>下一页</a>';
            }
        } else {
            $this->output .= '<span class=nextprev>下一页</span>';
        }

        //select下拉框直接跳转
        if ($this->script_jump) {
            $this->output .= "&nbsp;&nbsp;转到第<select onchange=\"javascript:pageCallback('" . $this->page_var . "='+this.options[this.selectedIndex].value+'" . ($this->var_str) . "');\" align=absmiddle  style=\"font-size:8pt;border: 1px solid #999999;\">\r";
        } else {
            $this->output .= '&nbsp;&nbsp;转到第<select onchange="javascript:window.location.href=\'' . $this->file . '?' . $this->page_var . '=\'+this.value+\'' . ($this->var_str) . '\'" align=absmiddle  style="font-size:8pt;border: 1px solid #999999;">\r';
        }

        $show_all = 200;
        $slice_start = 5;
        $slice_end = 5;
        $percent = 20;
        $range = 10;
        if ($total_pages < $show_all) {
            $pages = range(1, $total_pages);
        } else {
            $pages = array();
            for ($i = 1; $i <= $slice_start; $i++) {
                $pages[] = $i;
            }
            for ($i = $total_pages - $slice_end; $i <= $total_pages; $i++) {
                $pages[] = $i;
            }
            $i = $slice_start;
            $x = $total_pages - $slice_end;
            $met_boundary = false;
            while ($i <= $x) {
                if ($i >= ($current_page - $range) && $i <= ($current_page + $range)) {
                    $i++;
                    $met_boundary = true;
                } else {
                    $i = $i + floor($total_pages / $percent);
                    if ($i > ($current_page - $range) && !$met_boundary) {
                        $i = $current_page - $range;
                    }
                }

                if ($i > 0 && $i <= $x) {
                    $pages[] = $i;
                }
            }
            sort($pages);
            $pages = array_unique($pages);
        }
        foreach ($pages AS $i) {
            if ($i == $current_page) {
                $selected = 'selected="selected" style="font-weight: bold"';
            } else {
                $selected = '';
            }
            $this->output .= '<option ' . $selected . ' value="' . $i . '">' . $i . "</option>\r";
        }

        $this->output .= ' </select>页';


        //显示每页记录数及记录总数
        $this->output = '<div id="page_string" class="pages"><a class=p_total>共' . $record_nums . $unit . '</a>' . $this->output . '</div>';
    }

    function setNumPerPage($num_per_page) {
        $this->num_per_page = intval($num_per_page);
    }

    /**
     * 要传递的变量设置
     *
     * @access public
     * @param array $data   要传递的变量，用数组来表示，参见上面的例子
     * @return void
     */
    function setVar($data) {
        foreach ($data as $k => $v) {
            $this->var_str.='&amp;' . $k . '=' . urldecode($v);
        }
    }

    function setPageVar($page_var) {
        $this->page_var = $page_var;
    }

    function setLinkNum($number) {
        $this->link_num = intval($number);
    }

    /**
     * 分页结果输出
     *
     * @access public
     * @param bool $return 为真时返回一个字符串，否则直接输出，默认直接输出
     * @return string
     */
    function output($return = false) {
        if ($return) {
            return $this->output;
        } else {
            echo $this->output;
        }
    }

    function getOffset() {
        //echo $this->offset;

        return $this->offset;
    }

    function getTotalPages() {
        return $this->total_pages;
    }

    function getCurrentPage() {
        return $this->current_page;
    }

    function getNumPerPage() {
        return $this->num_per_page;
    }

}

//End Class
?>