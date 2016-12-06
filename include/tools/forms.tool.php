<?php
// ========================== 文件说明 ==========================//
// 本文件说明：表单生成类
// =============================================================//
error_reporting(7);

class forms {
var $debug=0;
var $fdpre="fd_";
var $iffdpre=0;
      function formheader($arguments=array(),$autoshow=1,$havetable=1) {
               global $HTTP_SERVER_VARS;
			   $str="";
               if ($arguments["enctype"]){
                   $enctype="enctype=\"$arguments[enctype]\"";
               } else {
                   $enctype="";
               }
               if (!isset($arguments["method"])) {
                   $arguments["method"] = "post";
               }
               if (!isset($arguments["action"])) {
                   $arguments["action"] =$_SERVER['PHP_SELF'];
               }

               if (!$arguments["colspan"]) {
                   $arguments["colspan"] = 2;
               }
               if (!$arguments["tablewidth"]) {
                   $arguments["tablewidth"] = "100%";
               }
			   if (!$arguments["class"]) {
                   $arguments["class"] = "tableoutline";
               }
               if($havetable){
			   $str.= "<table width=\"".$arguments["tablewidth"]."\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" class=\"".$arguments["class"]."\">\n";
			   }
			   
               $str.="<form action=\"$arguments[action]\" $enctype method=\"$arguments[method]\" name=\"$arguments[name]\" $arguments[extra]>\n";
               if ($arguments[title]!="") {
                   if($havetable){
				   $str.="<tr id=\"cat\">
                          <td class=\"td_tit\" colspan=\"$arguments[colspan]\">
                          <b>$arguments[title]</b>
                          </td>
                         </tr>\n";
					}else{
					$str.=$arguments["title"];
					}
						 
               }
			   return $this->out($str,$autoshow);

      }
     
      function formfooter($arguments=array(),$autoshow=1,$havetable=1){
               $str="";
 			   $appendstr=isset($arguments["appendstr"])?$arguments["appendstr"]:"";
			   $prestr=isset($arguments["prestr"])?$arguments["prestr"]:"";
              if($havetable)$str.= "<tr class=\"td\">\n";
              
               if ($arguments["confirm"]==1) {

                   $arguments["button"]["submit"]["type"] = "submit";
                   $arguments["button"]["submit"]["name"] = "submit";
                   $arguments["button"]["submit"]["value"] = "确认";
                   $arguments["button"]["submit"]["accesskey"] = "y";

                   $arguments["button"]["back"]["type"] = "button";
                   $arguments["button"]["back"]["value"] = "取消";
                   $arguments["button"]["back"]["accesskey"] = "r";
                   $arguments["button"]["back"]["extra"] = " onclick=\"history.back(1)\" ";

               } elseif (empty($arguments["button"])) {

                   $arguments["button"]["submit"]["type"] = "submit";
                   $arguments["button"]["submit"]["name"] = "submit";
                   $arguments["button"]["submit"]["value"] = "提交";
                   $arguments["button"]["submit"]["accesskey"] = "y";

                   $arguments["button"]["reset"]["type"] = "reset";
                   $arguments["button"]["reset"]["value"] = "重置";
                   $arguments["button"]["reset"]["accesskey"] = "r";

               }
               if(!empty($arguments["addbutton"])){
				    $arguments["button"]=array_merge($arguments["button"],$arguments["addbutton"]);
			   }
               if (empty($arguments[colspan])) {
                   $arguments[colspan] = 2;
               }
             
               if($havetable)$str.="<td colspan=\"$arguments[colspan]\" align=\"center\">\n";
		       $str.=$prestr;
               if (isset($arguments) AND is_array($arguments)) {
                   foreach ($arguments["button"] AS $k=>$button) {
                            if (empty($button["type"])) {
                                $button["type"] = "submit";
                            }
                            $str.=" <input class=\"button\" accesskey=\"$button[accesskey]\" type=\"$button[type]\" name=\"$button[name]\" value=\" $button[value] \" $button[extra]> \n";
                   }
               }
               $str.=$appendstr;
               if($havetable)$str.="</td>
                     </tr>\n";
               $str.="</form>\n";
               if($havetable)$str.="</table>\n";
			   return $this->out($str,$autoshow);
      }

      function tableheader() {
               echo "<table width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"1\" cellpadding=\"4\" class=\"tableoutline\">\n";
      }

      function tablefooter() {
               echo "</table>\n";
      }
      
      function maketd($arguments = array(),$autoshow=1,$havetable=1) {
        $str="";
		$midstr=isset($arguments["midstr"])?$arguments["midstr"]:"";
               if($havetable){
			    $str.="<tr ".$this->getrowbg()." nowrap>";
			   }
			   foreach ($arguments AS $k=>$v) {
                if($havetable){
				$str.="<td$arguments[textcss]>$v$midstr</td>";
				}else{
				$str.="$v$midstr";
				}
               }
          if($havetable)$str.="</tr>\n";
		   return $this->out($str,$autoshow);
      }

      function makeinput($arguments = array(),$autoshow=1,$havetable=1) {
$str="";
			   $split=isset($arguments["split"])?$arguments["split"]:",";
               if (empty($arguments[size])) {
                   $arguments[size] = 13;
               }
               if (empty($arguments[maxlength])) {
                   $arguments[maxlength] = 200;
               }
               if ($arguments["html"]) {
                   $arguments["value"] = htmlspecialchars($arguments["value"]);
               }
               if (!empty($arguments["css"])) {
                   $class = "class=\"$arguments[css]\"";
               } else {
                   $class = "class=\"input\"";
               }

               if (empty($arguments["type"])) {
                   $arguments["type"] = "text";
               }
			   
			   $arguments["textcss"]=isset($arguments["textcss"])?" class='".$arguments["textcss"]."'":" class='tdi'";
  			   $arguments["inputcss"]=isset($arguments["inputcss"])?" class='".$arguments["inputcss"]."'":" class='tdi'";
			   $arguments["allprestr"]=isset($arguments["allprestr"])?$arguments["allprestr"]:"";
			   $arguments["allendstr"]=isset($arguments["allendstr"])?$arguments["allendstr"]:"";
			   $arguments["midstr"]=isset($arguments["midstr"])?$arguments["midstr"]:"";
			   $arguments["prestr"]=isset($arguments["midstr"])?$arguments["prestr"]:"";
			   $arguments["addstr"]=isset($arguments["addstr"])?$arguments["addstr"]:"";
			   $arguments["name"]=isset($arguments["name"])?$arguments["name"]:"";
   			  $this->addfdpre($arguments);

              if (empty($arguments["id"])) {
			     $arguments["id"]=str_replace("[]","",$arguments["name"]);
			  }
			  if($havetable){
               $str.="<tr ".$this->getrowbg()." nowrap>
                      <td$arguments[textcss]>$arguments[text]</td>
                      <td$arguments[inputcss]>";
			  }else{
			  $str.=$arguments["text"];
			  }
			  $str.=$arguments["allprestr"];
				  if ($arguments["type"]=="checkbox"||$arguments["type"]=="radio") {
					   foreach ($arguments["option"] AS $key=>$value) {
					           if(eregi("^formline",$key)){
							   $str.="$arguments[prestr]$value$arguments[midstr]";
							   }else{
							   $checked="";
							   if(isset($arguments["checked"])){
									if (is_array($arguments["checked"])) {
									    if($key!==""){
										if ($arguments["checked"][$key]==1)$checked="checked";
										}
									} else{
										if($arguments["checked"]=="$key")$checked="checked";
									}
								}elseif(isset($arguments["value"])){
									if(eregi($split.$key.$split,$split.$arguments["value"].$split))$checked="checked";	
							    }
					          $str.= "$arguments[prestr]<input $class type=\"$arguments[type]\" name=\"$arguments[name]\" size=\"$arguments[size]\" maxlength=\"$arguments[maxlength]\" value=\"$key\" $arguments[extra] $checked id=\"$arguments[id]\">$value$arguments[midstr]\n";
							  }
					   }
				   }else{
			          $str.= "<input $class type=\"$arguments[type]\" name=\"$arguments[name]\" size=\"$arguments[size]\" maxlength=\"$arguments[maxlength]\" value=\"$arguments[value]\" $arguments[extra] id=\"$arguments[id]\">\n";
				   }
				   $str.= $arguments["addstr"];
	   			   $str.=$arguments["allendstr"];
		   if($havetable)$str.= "</td>
		 </tr>\n";
	   return $this->out($str,$autoshow);
      }
	  
      function makefile($args=array(),$autoshow=1,$havetable=1){
		$value=isset($args["value"])?$args["value"]:"";
	    $this->addfdpre($args);

		$str="";
		if($value!=""){
		  $clearstr="<input name=\"".$args["name"]."[]\" type=\"checkbox\" value=''>清除$args[text]";		
		}
		$str.=$this->maketd(array("$args[text]","<input type=\"file\" name=\"$args[name]\">$clearstr"),0,$havetable);
		if($value!=""){
		  $imgstr=getobjshow($value);
		  $str.=$this->maketd(array("$args[text]预览",$imgstr),0,$havetable);
		}elseif(isset($args["pre"])){
		  $imgstr=getobjshow($args["pre"]);
  		  $str.=$this->maketd(array("$args[text]预览",$imgstr),0,$havetable);
		}
		return $this->out($str,$autoshow);
	  }
      function maketextarea($arguments = array(),$autoshow=1,$havetable=1){
			   $arguments["textcss"]=isset($arguments["textcss"])?" class='".$arguments["textcss"]."'":" class='tdh'";
  			   $arguments["inputcss"]=isset($arguments["inputcss"])?" class='".$arguments["inputcss"]."'":" class='tdi'";
               if (empty($arguments[cols])) {
                   $arguments["cols"] = 50;
               }
               if (empty($arguments["rows"])) {
                   $arguments["rows"] = 3;
               }
               if (!empty($arguments["html"])) {
                   $arguments[value] = htmlspecialchars($arguments["value"]);
               }
               if (!empty($arguments["css"])) {
                   $class = "class=\"$arguments[css]\"";
               } else {
                   $class = "class=\"input\"";
               }
   			  $this->addfdpre($arguments);
   			   $arguments["addstr"]=isset($arguments["addstr"])?$arguments["addstr"]:"";
               if($havetable){
			     $str.="<tr ".$this->getrowbg()." nowrap>
                     <td valign=\"top\"$arguments[textcss]>$arguments[text]</td>
                     <td$arguments[inputcss]>";
				}else{
				 $str.=$arguments["text"];
				}
				$str.="<textarea $class type=\"text\" name=\"$arguments[name]\" cols=\"$arguments[cols]\" rows=\"$arguments[rows]\" $arguments[extra]>$arguments[value]</textarea>$arguments[addstr]";
               if($havetable)$str.="</td>
                   </tr>\n";
			   return $this->out($str,$autoshow);
      }



	  function makeselect($arguments = array(),$autoshow=1,$havetable=1){
$str=""; $this->addfdpre($arguments);
 			   $arguments["textcss"]=isset($arguments["textcss"])?" class='".$arguments["textcss"]."'":" class='tdh'";
  			   $arguments["inputcss"]=isset($arguments["inputcss"])?" class='".$arguments["inputcss"]."'":" class='tdi'";
               if ($arguments["html"]==1) {
                   $value = htmlspecialchars($value);
               }
               if ($arguments[multiple]==1) {
                   $multiple = " multiple";
                   if ($arguments[size]>0) {
                       $size = "size=$arguments[size]";
                   }
               }
               if (!empty($arguments[css])) {
                   $class = "class=\"$arguments[css]\"";
               } else {
                   $class = "class=\"input\"";
               }
			   $arguemnts["value"]=isset($arguments["value"])?$arguments["value"]:"";
			   $arguemnts["id"]=isset($arguments["id"])?$arguments["id"]:"";
			   $arguments["extra"]=isset($arguments["extra"])?$arguments["extra"]:"";
			   $id=($arguemnts["id"]!="")?" id='". $arguemnts["id"]."'":"";
			   if($arguemnts["value"]!="")$arguemnts["value"]=" value=".$arguemnts["value"];
             if($havetable){
			 $str.="<tr ".$this->getrowbg().">
                      <td valign=\"top\"$arguments[textcss]>$arguments[text]</td>
                      <td$arguments[inputcss]>";
			 }else{
			 $str.=$arguments["text"];
			 }                      
			 $str.="<select $class name=\"$arguments[name]\"$id$multiple $size $arguments[extra] $arguemnts[value]>\n";

               if (is_array($arguments['option'])) {

                   foreach ($arguments['option'] AS $key=>$value) {
				       if(eregi("^formline",$key)){
							   $str.="$value";
						 }else{
                            if (!is_array($arguments['selected'])) {
                                if ($arguments['selected']==$key) {
                                    $str.= "<option value=\"$key\" selected>$value</option>\n";
                                } else {
                                    $str.= "<option value=\"$key\">$value</option>\n";
                                }

                            } elseif (is_array($arguments["selected"])) {

                                if ($arguments["selected"]["$key"]==1) {
                                    $str.= "<option value=\"$key\" selected>$value</option>\n";
                                } else {
                                    $str.= "<option value=\"$key\">$value</option>\n";
                                }
                            }
					   }
                   }
               }

               $str.= "</select>\n";
			   $str.= $arguments["addstr"];
               if($havetable)$str.= "</td>
                     </tr>\n";
			return $this->out($str,$autoshow);

      }
      function makeyesno($arguments = array(),$autoshow=1,$havetable=1) {

               $arguments["option"] = array('1'=>'是','0'=>'否');
               $this->makeselect($arguments,$autoshow,$havetable);

      }
      function makechecka($a,$str,$midchar=","){
         $tmpa=array();
	     foreach($a as $key=>$val){
	        if(eregi("$midchar".$key."$midchar","$midchar$str$midchar"))$tmpa[$key]=1;
	     }
	     return $tmpa;
     }
	  function makea($a,$keyfd="id",$valuefd="name"){
	     $tmpa=array();
		 foreach($a as $key=>$val){
		  $tmpa[$val[$keyfd]]=$val[$valuefd];
		 }
		 return $tmpa;
	  }
      function makehidden($arguments = array(),$autoshow=1,$havetable=1){
               			  $this->addfdpre($arguments);

               $str="<input type=\"hidden\" name=\"$arguments[name]\" value=\"$arguments[value]\">\n";
			   return $this->out($str,$autoshow);
      }

      function getrowbg() {

               global $bgcounter;
               if ($bgcounter++%2==0) {
                   return "class=\"firstalt\"";
               } else {
                   return "class=\"secondalt\"";
               }

      }
	  function out($str,$autoshow=1){
	    if($autoshow)echo $str;
		return $str;
	  }	
	  
	   function addfdpre(&$args){
		    $args["iffdpre"]=isset($args["iffdpre"])?$args["iffdpre"]:$this->iffdpre;
		    $args["fdpre"]=isset($args["fdpre"])?$args["fdpre"]:$this->fdpre;
			if($args["iffdpre"])$args["name"]=$this->fdpre.$args["name"];
	  }
	  
	  function makeqstr($a,$baseurl=NULL,$data=NULL){
	    $data=$data===NULL?$_GET:$data;
	 	$baseurl=($baseurl!==NULL)?$baseurl:$_SERVER['SCRIPT_NAME'];
		$query=array();
		$data=array_merge($data,$a);
		while ( list ( $key, $val ) = @each ( $data ) )
		{
			if(is_array($val)){
			  foreach($val as $kval){
				$query[]=$key .'[]='. urlencode($kval);
			  }
			}else{
			  $query[] = $key . '=' . urlencode ( $val );
			}
		}
		$qstr=$baseurl. '?' . join ( '&', $query);
		return $qstr;
	  }

}
?>
