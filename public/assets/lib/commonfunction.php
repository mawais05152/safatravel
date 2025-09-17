<?php


class GTAClass 
{

	
 function mySqlMessage($querry_sql)
{
	echo "<div align='left'><strong><font color='red'>".GENERIC_ERROR." &nbsp;&nbsp;e	r r o r:</font></strong><br>";
	echo "Error in your Query: $querry_sql<BR>";
	echo "<strong><font color='red'>m y s q l &nbsp;g e n e r a t e d &nbsp;e r r o r:</font></strong><BR>";
	echo mysqli_connect_errno() . " " . mysql_error() . "</div>";
}



function select($linksql1,$querry_sql)
{
	$ob = new GTAClass();
	if((@$result = mysqli_query ($linksql1,$querry_sql))==FALSE)
	{
		if (DEBUG=="True")
		{
			echo $ob->mySqlMessage($querry_sql);		
		}	
	} 
	else	
	{
		if ($check=mysqli_fetch_array($result))
		{
      			return $check;
   	}
		return false;	
	}
}

function insert($linksql1,$querry_sql)
{	//echo $querry_sql;
	$ob = new GTAClass();
   if((@$result = mysqli_query ($linksql1,$querry_sql))==FALSE)
   	{
		if (DEBUG=="True")
		{
			echo $ob->mySqlMessage($querry_sql);		
		}	
	}   
	else
 	{	
		return true;	
	}
}

function update($linksql1,$querry_sql)
{


	$ob = new GTAClass();
	if((@$result = mysqli_query ($linksql1,$querry_sql))==FALSE)
  {
		if (DEBUG=="True")
		{
		echo $ob->mySqlMessage($querry_sql);		
		}	
	}   
	else
 	{	
		return true;
   	}
}

function delete($linksql1,$querry_sql)
{
	$ob = new GTAClass();
	if((@$result = mysqli_query ($linksql1,$querry_sql))==FALSE)
   	{
		if (DEBUG=="True")
		{
			echo $ob->mySqlMessage($querry_sql);		
		}	
	}   
	else
 	{	
		return true;	
	}
}

function selectMulti($linksql1,$querry_sql)
{   
	if((@$result = mysqli_query ($linksql1,$querry_sql))==FALSE)
   	{
	$ob = new GTAClass();
		if (DEBUG=="True")
		{
			echo $ob->mySqlMessage($querry_sql);		
		}	
	}   
	else
 	{	
	    $count = 0;
		$data = array();
		while ( $row = mysqli_fetch_array($result)) 
		{
			$data[$count] = $row;
			$count++;
		}
			return $data;
	}
}


function selectOprations($select_qry)
{   
	if((@$result = mysql_query($select_qry))==FALSE)
   	{
	$ob = new GTAClass();
		if (DEBUG=="True")
		{
			echo $ob->mySqlMessage($select_qry);		
		}	
	}   
	else
 	{	
	    $count = 0;
		$data = array();
		while ( $row = mysql_fetch_array($result)) 
		{
			$data[$count] = $row;
			$count++;
		}
			return $data;
	}
}

function curPageName()
 {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 }

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
 
function pageHits($linksql1,$page)
{
	$ob = new GTAClass();
	$result = $ob->select($linksql1,"Select page_hits From tbl_pages Where page_navigation='$page'");
	$page_hits = $result['page_hits']+1;
	$ob->update($linksql1,"Update tbl_pages Set page_hits=$page_hits Where page_navigation='$page' ");
}

function pageName($linksql1,$page)
{
	$ob = new GTAClass();
	$result = $ob->select($linksql1,"Select page_name From ue_pages Where page_url='$page'");
	return $result['page_name'];
}

function pageHeading($linksql1,$page)
{
	$ob = new GTAClass();
	$query	=	"Select page_heading From ue_pages Where page_navigation='$page'";
//	echo "query	=	"	.	$query	.	"<br>";
	$result = $ob->select($linksql1,$query);
	return $result['page_heading'];
}

function pageImageHeading($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_image_heading From tbl_pages Where page_url='$page'");
	return $result['page_image_heading'];
}

function pageImage($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_image From tbl_pages Where page_navigation='$page'");
	return $result['page_image'];
}

function pageContent($linksql1,$page)
{
	$ob = new GTAClass();
	$result = $ob->select($linksql1,"Select page_content From ue_pages Where page_navigation='$page'");
	return $result['page_content'];
}

function pageMetaTitle($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_title From tbl_pages Where page_navigation='$page'");
	return $result['page_title'];
}

function pageMetaKeyword($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_keyword From tbl_pages Where page_navigation='$page'");
	return $result['page_keyword'];
}

function pageMetaDescription($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_description From tbl_pages Where page_navigation='$page'");
	return $result['page_description'];
}

function pageMetaAuthor($page)
{
	$ob = new GTAClass();
	$result = $ob->select("Select page_author From tbl_pages Where page_navigation='$page'");
	return $result['page_author'];
}

function extensionVideo($filename)
{
        $ext = strrchr($filename,".");
        if ($ext ==".flv" )  {
            return 1;
        }  else  {
			return 0;
        }
}

function extensionXls($filename)
{
        $ext = strrchr($filename,".");        
        if ($ext ==".xls" )  {
            return 1;
        }  else  {
			return 0;
        }
}

function dateDiff($date1, $date2) 
{
		$s = strtotime($date2)-strtotime($date1);
 		$d = intval($s/86400); 
 		$s -= $d*86400;
 		$h = intval($s/3600);
 		$s -= $h*3600;
 		$m = intval($s/60); 
 		$s -= $m*60;
 		return array("d"=>$d,"h"=>$h,"m"=>$m,"s"=>$s);
}

function dateDiffInDate($endDate, $beginDate)
{
$bdate=explode("/", $beginDate);
$eedate=explode("/", $endDate);
$start_date=gregoriantojd($bdate[0], $bdate[1], $bdate[2]);
$end_date=gregoriantojd($edate[0], $edate[1], $edate[2]);
return $end_date - $start_date;
}

function dateDifference($start,$end)
{
	$diff = abs(strtotime($end) - strtotime($start));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	return array("years"=>$years,"months"=>$months,"days"=>$days);
}
function getAgeYear($Birthdate)
{
	//$Birthdate = "$year-$month-$day";
	// Explode the date into meaningful variables
	list($BirthYear,$BirthMonth,$BirthDay) = explode("-", $Birthdate);
	// Find the differences
	$YearDiff = date("Y") - $BirthYear;
	$MonthDiff = date("m") - $BirthMonth;
	$DayDiff = date("d") - $BirthDay;
	// If the birthday has not occured this year
	if ($DayDiff < 0 || $MonthDiff < 0)
	$YearDiff--;
	return $YearDiff;		
	/*
	$birthday = "$day-$month-$year";
	$today = date('d-m-Y');
	$a_birthday = explode('-', $birthday);
	$a_today = explode('-', $today);
	$day_birthday = $a_birthday[0];
	$month_birthday = $a_birthday[1];
	$year_birthday = $a_birthday[2];
	$day_today = $a_today[0];
	$month_today = $a_today[1];
	$year_today = $a_today[2];
	$age = $year_today - $year_birthday;
	if(($month_today < $month_birthday) || ($month_today == $month_birthday && $day_today < $day_birthday))
	 {
		$age--;
	 }
	return $age; 
	*/
}

function getDays($dformat, $end_date, $begin_date)
 {
    $date_parts1=explode($dformat, $begin_date);
    $date_parts2=explode($dformat, $end_date);
    $start_date=gregoriantojd($date_parts1[1], $date_parts1[0], $date_parts1[2]);
    $end_date=gregoriantojd($date_parts2[1], $date_parts2[0], $date_parts2[2]);
    return $end_date - $start_date;
 }

function countRecords($linksql1,$query)
{	//echo $query;
    $res = mysqli_query($linksql1,$query);
    $results = mysqli_num_rows($res);
   	return $results;
}

function isExist($linksql1,$querry_sql) 
{
	

	$ob = new GTAClass();
   if((@$result = mysqli_query ($linksql1, $querry_sql))==FALSE)
   {
  
		if (DEBUG == "True")
		{
			echo $ob->mySqlMessage($querry_sql);		
		}	
	} 
	else 
	{
			
		if ($check=mysqli_fetch_array($result))
		{//mysql_fetch_array return flase if there are no records
    	return $check;
  	}	
	
		return false;	
	}//else 
}

function downloadFile($url)
{
	$fullPath = $url;
	if($fullPath != "/"){
		if ($fd = fopen ($fullPath, "r")) {
			$fsize = filesize($fullPath);			
			//use pathinfo() to get the fileinformation (extesnion)
			$path_parts = pathinfo($fullPath);
			//get extension of file
			$ext = strtolower($path_parts["extension"]);
			switch ($ext) {
				case "pdf":
					header("Content-type: application/pdf"); // add here more headers for diff. extensions
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachement' to force a download
					break;
				case "doc":
					header("Content-type: application/doc");
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
					break;
				case "xls":
					header("Content-type: application/xls");
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
					break;
				case "jpg":
					header("Content-type: image/jpg");
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
					break;
				default:
					header('Content-Type: application/octet-stream');	
					header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
			}
	
			header("Content-length: $fsize");
			header("Cache-control: private"); //use this to open files directly
			while(!feof($fd)) {
				$buffer = fread($fd, 2048);
				echo $buffer;
			}
		}
		fclose ($fd);
	//	exit;
	}
//	$filename = $url;
//	// Create download file name to be dissplayed to user
//	$saveasname = basename($filename);
//	// Send binary filetype HTTP header
//	header('Content-Type: application/xls');
//	// Send content-length HTTP header
//	header('Content-Length: '.filesize($filename));
//	// Send content-disposition with save file name HTTP header
//	header('Content-Disposition: attachment; filename="'.$saveasname.'"');
//	// Use this to open files directly
//	header("Cache-control: private");
//	// Output file
//	readfile($filename);
	
}
function returnMonthName($monthNum)
{
	switch($monthNum)
	{
    case "01" :
        $stringmonth = "January";
        break;
    case "02" :
        $stringmonth = "February";
        break;
    case "03" :
        $stringmonth = "March";
        break;
    case "04" :
        $stringmonth = "April";
        break;
    case "05" :
        $stringmonth = "May";
        break;
    case "06" :
        $stringmonth = "June";
        break;
    case "07" :
        $stringmonth = "July";
        break;
    case "08" :
        $stringmonth = "August";
        break;
    case "09" :
        $stringmonth = "September";
        break;
    case "10" :
        $stringmonth = "October";
        break;
    case "11" :
        $stringmonth = "November";
        break;
    case "12" :
        $stringmonth = "December";
        break;
	}
	//echo "value	=	"	.	$stringmonth	.	"<br>";
	
	return $stringmonth;
}

function displayMessage($msg)
{
	return "<font color=" . MSG_COLOR . "><b>" . $msg . "</b></font>";
}
//////////////

function sendMail($to, $subject, $message, $name, $from)
{
	mail($to,$subject,$message,"From: $name <$from> \nReply-To:<$from> \nContent-Type: text/html; charset=iso-8859-1");
}

function sendMailCC($to, $subject, $message, $name, $from, $cc)
{
	mail($to,$subject,$message,"From: $name <$from> \nReply-To:<$from> \nContent-Type: text/html; charset=iso-8859-1 \nCc: $cc");
}

function sendMailBcc($to, $subject, $message, $name, $from, $bcc)
{
	mail($to,$subject,$message,"From: $name <$from> \nReply-To:<$from> \nContent-Type: text/html; charset=iso-8859-1 \nBcc: $bcc");
}

/* ---- Delete Directory -------------------------*/

function deleteDirectory($dirname)
{
	if(is_dir($dirname))
	 {
		$dir_handle = opendir($dirname);
	 }
	if (!$dir_handle)
	{
		return false;		
	}
	while($file = readdir($dir_handle))
 		{
			if($file != "." && $file != "..")
	 		 {
				if(!is_dir($dirname."/".$file))
		  	 {
					unlink($dirname."/".$file);	
		 		 }
				else
		 		 {
					deleteDirectory($dirname.'/'.$file);
		 		 }
   		}
	 }
  closedir($dir_handle);
  rmdir($dirname);
  return true;
} 

function redirect($url)
{
	echo "<meta http-equiv=refresh content=1;URL=$url>";
}
///////////

function encrypt($text)
{
	$enc_str=MD5($text);
	return $enc_str;
}

function imageSize($img_path,$img_name)
{
 $size=getimagesize($img_path . $img_name);
 if($size[0]>60)
   $width=60;
 else
   $width=60;//$size[0];
 if ($size[1] > 80)
   $height=80;
 else
   $height=80;//$size[1];
	echo " width=" . $width . " height=" . $height . " border=0";
}

function extension($filename)
{
  $ext = strrchr($filename,".");
  if($ext ==".bmp" || $ext ==".BMP" || $ext ==".gif" || $ext ==".JPG"|| $ext ==".jpg" || $ext ==".jpeg" || $ext ==".JPEG" || $ext ==".GIF" || $ext ==".JPG" || $ext ==".PNG" || $ext ==".png" || $ext ==".TIFF" || $ext ==".tiff")
   {
 	  return 1;
   }
  else 
   {
	  return 0;
   }
}

function cvExtension($filename)
{
  $ext = strrchr($filename,".");
//  if($ext ==".doc" || $ext ==".DOC" || $ext ==".docx" || $ext ==".DOCX" || $ext ==".pdf"  || $ext ==".PDF" || $ext ==".rtf" || $ext ==".RTF" || $ext ==".txt" || $ext ==".TXT" || $ext ==".jpg" || $ext ==".JPG" || $ext ==".jpeg" || $ext ==".JPEG" || $ext ==".gif" || $ext ==".GIF" || $ext ==".bmp" || $ext ==".BMP" || $ext ==".tif" || $ext ==".TIF" || $ext ==".png" || $ext ==".PNG")
  if($ext ==".doc" || $ext ==".DOC" || $ext ==".docx" || $ext ==".DOCX" || $ext ==".pdf"  || $ext ==".PDF")
   {
 	  return 1;
   }
  else 
   {
	  return 0;
   }
}

function videoExtension($filename)
{
  $ext = strrchr($filename,".");
  if($ext ==".3gp" || $ext ==".3GP" || $ext ==".mov" || $ext ==".MOV"|| $ext ==".mpg" || $ext ==".MPG" || $ext ==".mpeg" || $ext ==".MPEG" || $ext ==".avi" || $ext ==".AVI" || $ext ==".wmv" || $ext ==".WMV")
   {
 	  return 1;
   }
  else 
   {
	  return 0;
   }
}

function createRandomString($length) 
{
	$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz0123456789';
	$max=strlen($base)-1;
	$activatecode='';
	mt_srand((double)microtime()*1000000);
	while(strlen($activatecode)<$length+1)
	{
		$activatecode.=$base{mt_rand(0,$max)};	
	}
	return $activatecode;
}

function createRandomNumericString($length) 
{
	$base='0123456789';
	$max=strlen($base)-1;
	$activatecode='';
	mt_srand((double)microtime()*1000000);
	while(strlen($activatecode)<$length+1)
	{
		$activatecode.=$base{mt_rand(0,$max)};	
	}
	return $activatecode;
}

function getPaging($offset, $total_record, $perPage, $url)
 {
	if (($offset >= 0) && ($offset-$perPage < 0)){
		echo "<font color='#999999'><b>&laquo;&laquo</b></font>";
    	}
	 
	if ($offset > 0){
	 	$offset_pre=$offset-$perPage;
		if ($offset_pre<0){ 
			$offset_pre=0;
		}
		$next=$offset-$perPage;
	      	echo "<a href='$url&offset=$next' title='Move Previous'>";
		echo "<font color=" . MSG_COLOR . "><b>&laquo;&laquo;</b></font></a>"; 
	}
		echo " <font color='#999999'>|</font> ";
		if ($offset <= $total_record-($perPage+1)){
			$next=$offset+$perPage;
			echo "<a href='$url&offset=$next' title='Move Next'>";
			echo "<font color=" . MSG_COLOR . "><strong>&raquo;&raquo;</strong></font></a>"; 
        	}  
		
		if ($offset > $total_record-($perPage+1)){
	        	echo "<font color='#999999'><strong>&raquo;&raquo;</strong></font>"; 
		}
}

function getIP()
{
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && eregi("^[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}$",$_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{
	   	$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}

function dateFormatMonthDayYear($date) 
{
	if(trim($date)!="")
	 {
		$date1=date("m", strtotime($date));
		$date1.="/";
		$date1.=date("d", strtotime($date));
		$date1.="/";  
		$date1.=date("Y", strtotime($date));
	 }
	else
	 {
		$date1 = "";
	 }
	return $date1;
} 
function retrunYears($to_date,$from_date)
{
	$to_date = date("Y", strtotime($to_date));
	$from_date = date("Y", strtotime($from_date));
	if($to_date==$from_date)
	 {
	 	$result = $from_date;
	 }
	else
	 {
		$result = $to_date." - ".$from_date;
	 }
	return $result; 
}
function decrypt($encUser)
{
	$ob = new GTAClass();
	$content=$ob->select("select user_id from " . TBL_USERS . " where enc_userid='$encUser' ");
	return $content["user_id"];
}

function phoneFormat($phone)
{
	$phone_number = substr($phone,0,3);
	$phone_number .= " - ";
	$phone_number .= substr($phone,3,3);
	$phone_number .= " - ";
	$phone_number .= substr($phone,6,4);
	return $phone_number;
}

function dataBaseDateFormat($date)
{
	if(trim($date)!="")
	 {
		$date1=date("Y", strtotime($date));
		$date1.="-";
		$date1.=date("m", strtotime($date));
		$date1.="-";  
		$date1.=date("d", strtotime($date));	
	 }
	else
	 {
		$date1 = "";
	 }
	return $date1;
}


function dataBaseDateTimeFormat($date)
{
	if(trim($date)!="")
	 {
		$date1=date("Y", strtotime($date));
		$date1.="-";
		$date1.=date("m", strtotime($date));
		$date1.="-";  
		$date1.=date("d", strtotime($date));	
		$date1.=" ";  
		$date1.=date("H", strtotime($date));	
		$date1.=":";  
		$date1.=date("i", strtotime($date));	
		$date1.=":";  
		$date1.=date("s", strtotime($date));	
	 }
	else
	 {
		$date1 = "";
	 }
	return $date1;
}

function dateFormat($date)
{
	if(trim($date)!="")
	 {
		$date1=date("m", strtotime($date));
		$date1.="/";
		$date1.=date("d", strtotime($date));
		$date1.="/";  
		$date1.=date("Y", strtotime($date));
	 }
	else
	 {
		$date1 = "";
	 }	
	return $date1;
}

function dateFormatAus($date)
{
	if(trim($date)!="")
	 {
		$date1=date("d", strtotime($date));
		$date1.="/";
		$date1.=date("m", strtotime($date));
		$date1.="/";  
		$date1.=date("Y", strtotime($date));
	 }
	else
	 {
		$date1 = "";
	 }	
	return $date1;
}

function dateMonthYear($date)
{
	if(trim($date)!="")
	 {
		$date1=date("d", strtotime($date));
		$date1.=" ";
		$date1.=date("M", strtotime($date));
		$date1.=" ";  
		$date1.=date("y", strtotime($date));	
	 }
	else
	 {
		$date1 = "";
	 }	
	return $date1;
}


function monthDateYear($date)
{
	if(trim($date)!="")
	 {
		$date1=date("F", strtotime($date));
		$date1.=" ";
		$date1.=date("d", strtotime($date));
		$date1.=", ";  
		$date1.=date("Y", strtotime($date));	
	 }
	else
	 {
		$date1 = "";
	 }	
	return $date1;
}

function dateMonthYearTime($date)
{
		$date1=date("d", strtotime($date));
		$date1.="/";
		$date1.=date("m", strtotime($date));
		$date1.="/";  
		$date1.=date("Y", strtotime($date));
		$date1.="  at  ";
		$date1.=date("h", strtotime($date));
		$date1.=":";
		$date1.=date("i", strtotime($date));
		$date1.=":";  
		$date1.=date("s", strtotime($date));
		$date1.="  "; 
		$date1.=date("a", strtotime($date));
	return $date1;
}

function Escap($str)
{
	$result=str_replace("'","\'",$str);
	return $result;
}

function cleanDoubleQuotes($str)
{
	$result=str_replace('"','&#34;',$str);
	return $result;	
}

function cleanSingleDoubleQuotes($str)
{
	$str=str_replace('"','&#34;',$str);
	$str=str_replace("'","&#39;",$str);
	return $str;	
}

function retainSingleDoubleQuotes($str)
{
	$str=str_replace('&#34;','"',$str);
	$str=str_replace("&#39;","'",$str);
	return $str;	
}

function escapCharacters($str)
{
  //$result=mysql_real_escape_string($str);
  $result=str_replace("'","&#39;",$str);
	return $result;
}

function cleanString($str)
{
  if($str==NULL || $str=="")
    return "";

  $str = preg_replace("/(\n)|(\r)|(\t)/", " ", $str);
  $str = preg_replace("/[\ ]+/", " ", $str);
  $str = str_replace(array("'", '"'), array(""), $str);
  return $str;
}

function dateTimeFormatEmail($date)
{
		$date1=date("d", strtotime($date));;
		$date1.="/";
		$date1.=date("m", strtotime($date));;
		$date1.="/";  
		$date1.=date("Y", strtotime($date));;
		$date1.="  /   ";
		$date1.=date("h", strtotime($date));;
		$date1.=":";
		$date1.=date("i", strtotime($date));;
		$date1.=":";  
		$date1.=date("s", strtotime($date));;
		$date1.="  "; 
		$date1.=date("a", strtotime($date));;
	return $date1;
}

function dateTimeReplyFormat($date)
{
		$date1=date("D", strtotime($date));
		$date1.=", ";
		$date1.=date("M", strtotime($date));
		$date1.=" ";  
		$date1.=date("d", strtotime($date));
		$date1.=", "; 
		$date1.=date("Y", strtotime($date));
		$date1.="  at   ";
		$date1.=date("g", strtotime($date));
		$date1.=":";
		$date1.=date("i", strtotime($date));
		$date1.=" ";  
		$date1.=date("A", strtotime($date));		
	return $date1;
}

function dateTimeFormat($date)
{
		$date1=date("d", strtotime($date));;
		$date1.="/";
		$date1.=date("m", strtotime($date));;
		$date1.="/";  
		$date1.=date("Y", strtotime($date));;
		$date1.="    ";
		$date1.=date("h", strtotime($date));;
		$date1.=":";
		$date1.=date("i", strtotime($date));;
		$date1.=":";  
		$date1.=date("s", strtotime($date));;
		$date1.="  "; 
		$date1.=date("a", strtotime($date));;
	return $date1;
}

function dateTimeNewFormat($date)
{
		$date1=date("F", strtotime($date));;
		$date1.=" ";
		$date1.=date("j", strtotime($date));;
		$date1.=" ";  
		$date1.=date("Y", strtotime($date));;
		$date1.=" - ";
		$date1.=date("g", strtotime($date));;
		$date1.=":";
		$date1.=date("i", strtotime($date));;
		$date1.=":";  
		$date1.=date("a", strtotime($date));;
	return $date1;
}

function fileCopy($file_origin, $destination_directory, $file_destination, $overwrite, $fatal) 
{
//chmod("$destination_directory",0777);
	if ($fatal){
		$error_prefix = 'FATAL: File copy of \'' . $file_origin . '\' to \'' . $destination_directory . $file_destination . '\' failed.';
		$fp = @fopen($file_origin, "r");
		if (!$fp){
		echo $error_prefix . ' Originating file cannot be read or does not exist.';
		exit();
		}

		$dir_check = @is_writeable($destination_directory);
		if (!$dir_check){
		echo $error_prefix . ' Destination directory is not writeable or does not exist.';
		exit();
		}

		$dest_file_exists = file_exists($destination_directory . $file_destination);

		if ($dest_file_exists){
			if ($overwrite){
				$fp = @is_writeable($destination_directory . $file_destination);
				if (!$fp){
				  echo  $error_prefix . ' Destination file is not writeable [OVERWRITE].';
				  exit();
				}
		  	$copy_file = @copy($file_origin, $destination_directory . $file_destination); 
			}           
		}else{
			$copy_file = @copy($file_origin, $destination_directory . $file_destination);
		}
  	}else{
	    	$copy_file = @copy($file_origin, $destination_directory . $file_destination);
	  }
//chmod("$destination_directory",0755);
}
///////////
function getRequiredImageSize($file,$rwidth,$rheight) 
{ 
  
    list($width,$height)=getimagesize($file);

    $reduce_width=0;
    $required_width=0;
    $reduce_height=0;
    $required_height=0;
     //Here The Actual Procedure Starts.
    if($width >= $height)
	  {                    			//To decide either you want to shrink image using width-to-height.
       	 if($width  >= $rwidth ) 
		   {  					//You Must Place here IMG_MAX_WIDTH_SIZE in place of 100. Mention here the allowed max width size.
			 for($w=$width; $w > $rwidth; $w--)
			   {   							//You Must Place here IMG_MAX_WIDTH_SIZE in place of 100.
				 $reduce_width++;
			   }
			   $required_width=$width-$reduce_width;  //Your Required Width of the Image.
			 // echo "<br>The required width is ".$required_width;  //Just to show the reduction value;
			   $width_percentage=(100/$width)*$reduce_width;
			   $reduce_height=($height*$width_percentage)/100;
			   $required_height=round($height-$reduce_height);  //Your Required Height of the Image.
           }   //End of if($width  > IMG_MAX_WIDTH_SIZE ) brace here. 
      } 
	else
	  { 			 //This is the else case if $height > $width
		 if($height  >= $rheight)
		   {  
			  for($h=$height; $h > $rheight; $h--)
			    { 
				   $reduce_height++;
			    }
			    $required_height=$height-$reduce_height;
			    //  echo "<br>The required height is   ".$required_height;  //Just to show required height
			    $height_percentage=(100/$height)*$reduce_height;
			    $reduce_width=($width*$height_percentage)/100;
			    $required_width=round($width-$reduce_width);
		   } // End of if($height  > IMG_MAX_HEIGHT_SIZE) brace here.		  
	   }  //end of the else brace.	
	    if($required_width == 0){$required_width = $width;}
	    if($required_height == 0){$required_height = $height;}

	    $SizImg[0] = $required_width;
	    $SizImg[1] = $required_height;
	    return $SizImg;
} //End of the Get_Required_Image_Size function
///////////

function countImgSize($img)
{
	
	// Get image all parameters
	list($width, $height, $type, $attr) = getimagesize($img);
	
	// add size of window layout in hwight and wisth
	$width = $width + 90;
	$height = $height + 90;
	
	// check if image width and height is lesser then the size of window layout and assign minimum size of window
	if ($width < 425) {
		$width = 425;
	}
	if ($height < 348) {
		$height = 348;
	}
	
	// check if image size is geater then the size of screen then assign maximum size	
	if ($width > 760) {
			$width = 760; 
			// set maximum size of popup window and set scroll = yes
			$scrollFalr="yes";
	}
	if ($height > 540) {
			$height = 540; 
			// set maximum size of popup window and set scroll = yes
			$scrollFalr="yes";
	}
	// retuen array with width, height and scroll flag parameneters
	$SizArr[0] = $width;
	$SizArr[1] = $height;
	if($scrollFalr == "yes"){
			$SizArr[2] = 1;
	}else{
			$SizArr[2] = 0;
	}
	
	return $SizArr;
}
////////////////////////////
//comma Seprated Value//////

function comma_seperated_value($colName)
{
	$col = explode(",",$colName);
	$results="";
	foreach($col as $key => $value)
	{
		if(trim($value)!="")
		{
			if($results=="")
				$results = $value;	
			else
				$results = $results.", ".$value;	
		}
	}	
	return  $results;
}
//////////////

function getDomain($url)
{
    if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE)
    {
        return false;
    }
    /*** get the url parts ***/
    $parts = parse_url($url);
    /*** return the host domain ***/
    return $parts['scheme'].'://'.$parts['host'];
}

function getCountry($ip)
{
	$q  = "SELECT countryName FROM tbl_iptocountry	WHERE ipFrom <= inet_aton('$ip') AND ipTo >= inet_aton('$ip')";
	if(!$rs = mysql_query($q)) return false;
	$rw = mysql_fetch_object($rs);
	if(!$rw)
		return false;
	else
		return $rw->countryName;
}

//////////////

function priceFormat($price)
{
	 $price = number_format($price, 2, '.', ',');
	 return $price;
}
///////////

function validExtension($AddImg)
{
	$get_extension = strpos($AddImg,".gif");
	if($get_extension == false){
		$get_extension=strpos($AddImg,".jpg");
	}	
	return $get_extension;
}	

function productHits($product_id)
{
	$ob = new GTAClass();
	$result = $ob->select("Select product_hits From tbl_products Where product_id='$product_id'");
	$product_hits = $result['product_hits']+1;
	$ob->update("Update tbl_products Set product_hits=$product_hits Where product_id='$product_id' ");
}

function addItem($product_id, $product_quantity)
{	
	if($product_quantity  == 0)
	 {
				$product_quantity = 1;
				if(isset($_SESSION['products'][$product_id]['product_id']) && $_SESSION['products'][$product_id]['product_id'] != "")
				 {	
						$_SESSION['products'][$product_id]['product_id'] = $product_id;
						$_SESSION['products'][$product_id]['product_quantity'] = $_SESSION['products'][$product_id]['product_quantity'] + $product_quantity;
				 }
				else
				 {
						$_SESSION['products'][$product_id]['product_id'] = $product_id;
						$_SESSION['products'][$product_id]['product_quantity'] =  $product_quantity;
				 }
	 }
	else
	 {
				if(isset($_SESSION['products'][$product_id]['product_id']) && $_SESSION['products'][$product_id]['product_id'] != "")
				 {	
						$_SESSION['products'][$product_id]['product_id'] = $product_id;
						$_SESSION['products'][$product_id]['product_quantity'] = $_SESSION['products'][$product_id]['product_quantity'] + $product_quantity;
				 }
				else
				 {
						$_SESSION['products'][$product_id]['product_id'] = $product_id;
						$_SESSION['products'][$product_id]['product_quantity'] =  $product_quantity;
				 }
	 }
}
	
function updateItem($product_id,$product_quantity)
{
	if($product_quantity == 0)
	 {
		 	$product_quantity = 1;
			$_SESSION['products'][$product_id]['product_id'] = $product_id;
			$_SESSION['products'][$product_id]['product_quantity'] =  $product_quantity;
	 }
	else
	 {
			$_SESSION['products'][$product_id]['product_id'] = $product_id;
			$_SESSION['products'][$product_id]['product_quantity'] =  $product_quantity;
	 }
}

function deleteItem($product_id)
{	
		$_SESSION['products'][$product_id] = array();
		$_SESSION['products'][$product_id] = NULL;
		$_SESSION['products'][$product_id] = '';
		unset($_SESSION['products'][$product_id]);
}


function youtubeid($url) {
    if (preg_match('%youtube\\.com/(.+)%', $url, $match)) {
            $match = $match[1];
            $replace = array("watch?v=", "v/", "vi/");
            $match = str_replace($replace, "", $match);
    }
    return $match;
}
function youtubeViews($id) {
	$video_ID = $id;
	$JSON = file_get_contents("http://gdata.youtube.com/feeds/api/videos?q={$video_ID}&alt=json");
	$JSON_Data = json_decode($JSON);
	$views = $JSON_Data->{'feed'}->{'entry'}[0]->{'yt$statistics'}->{'viewCount'};
	return $views;	
}


}///////////class

//#############------ Class Contianing Paging Function, Image Reduction Function is Here -------###########
define("LINK_PAGES","8");

class Paging
 {

  
  function pagingNewStyleFinal($url,$offset,$clicked_link,$total_records,$total_records_per_page) 
   { 
		if($clicked_link=='') 
		 {
	 		$clicked_link = 1;  //For the first time to enter
	   }       
		 $limit_per_page = $total_records_per_page;//This constant will contain how many records will be shown on the current page.
		 $link_pages     = LINK_PAGES;   //This constant will show how many links will be available at a time at each page. 
		 $current_page_number  = $offset / $limit_per_page;  //This constant will provide the current page number;
		 $current_page_number  = intval($current_page_number); //This function will provide the integer part in case of wrong offset.
		 $current_page_number += 1;                     //This will show the actual page number.
		 $next_page_number     = $current_page_number + 1;               //This will contain the next page number.
		 $back_page_number     = $current_page_number - 1;               //This will contain the old page number.
		 $next_clicked_link    = $clicked_link + 1;                      //This will store the next link clicked value.
		 $back_clicked_link    = $clicked_link - 1;                      //This will store the back link clicked value.
		 $available_links      = ceil($total_records / $limit_per_page); //This will define the total links.
		 $actual_page_number   = $current_page_number;                   //This variable will save the number as in calculating from offset.
		 $actual_clicked_link  = $clicked_link;                          //This variable will save the number as in coming from address bar.
		 $actual_offset        = $offset;                                //This variable will store the original offset of the page.

		           //For a Previous Page Procedure
	    if($back_clicked_link < 1 )
		  {
		    $back_clicked_link = 1;                                     //Less than 1 is not allowed.
		  }
		if($back_page_number < 1 )
		 {
		    $back_page_number = 1;                                      // Less than 1 is not allowed.
		 }	    
		                      
							  /*********** Begin Save Actual Page Number & Clicked_link ***********/
		                          
							  /*********** End Save Actual Page Number & Clicked_link ***********/
							  
	if(!isset($offset)|| $offset=="" || $offset < 0) // If you are coming for the first time on the concerned page.
   {
	  $offset=0;                  //It is basically an offset address of the records to be shown.
	 }	
	 $end=$offset-0;              //This constant is another copy of offset but used in limit case.
 $this_is=$end+$limit_per_page; //This will be used at the end to check the Next Link of the page either it should be hyperlinked or not.
 $back=$end- $limit_per_page;   //Similar to the next case, it will be used for the Previous Link either it should be hyperlinked or non-hyperlink.
 $next=$end+ $limit_per_page;   //This will contain the offset of the next link following the current link.
         
           /************* Supporting Area Either Accessing Page From First or Last ***********/
		     if($clicked_link==1 && $current_page_number != 1)
		       {  
			     $link_access='back';
			   }
		     else
		       {
			     $link_access='forward';
			   }  
 
     echo  " <div class='card-footer text-right'>";
     echo  " <nav class='d-inline-block'> <ul class='pagination mb-0'>";

                      /*  #################-----First Link Area Begin------###############  */
	 if($offset!=0)                                         
	     {
		  echo "<li class='page-item active'>
                          <a class='page-link' href=\"$url&offset=0&clicked_link=1\" title=\"Records&nbsp;From&nbsp;1&nbsp;To&nbsp;$limit_per_page&nbsp;of&nbsp;$total_records\">
                          <i class='fas fa-chevron-left'>&nbsp;First</i></a>
                        </li>";
		 } 
	 else
	     {
	      echo "<li class='page-item disabled'>
                          <a class='page-link' href='#' >
                          <i class='fas fa-chevron-left'>&nbsp;First</i></a>
                       "; 
		 } 
                     /*  #################-----First Link Area End------###############  */		 
		 
                    /*  #################-----Previous Link Area Begin------###############  */
					
					             /*   Start To calculate the title tooltips     */
			             //No Need of Check less than 0, because it will be alreadly de-active. (optionally Given).
				 if($offset != 0 )
				   {			  
					$back_title_start = $offset-$limit_per_page + 1;           //Begin Record number in the tool tip.
					$back_title_end   = $back_title_start + $limit_per_page-1; //End Record Number in the tool tip.
		           }  
						         /*   End To calculate the title tooltips       */
			    if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )
				   {
				     //$link_access = 'back';
				   //$back_clicked_link = 1;
				   }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $back_clicked_link = $link_pages - $local_count + 1;
				  }	
					 		     
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $back_clicked_link = $link_pages - 1;
			    }		 
								
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $back_clicked_link = $local_count - 1;
			   }	
				
						//End of the check to be cached
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  // echo "Hellow ! This is a special case. I am here";
			   //echo "the clicked link is ".$clicked_link;
			  // echo "the next clicked link is ".$next_clicked_link;	
			  $back_clicked_link = $actual_page_number - 1;
			   }	
			if($back_clicked_link < 1)
				   {
				    $back_clicked_link = 1;
				   }				 
			
								 

    if($back >=0) 
	   {                  
   	    echo "<li class='page-item active'>
                          <a class='page-link' href=\"$url&offset=$back&clicked_link=$back_clicked_link\" title=\"Records From&nbsp;$back_title_start&nbsp;To&nbsp;$back_title_end&nbsp;of&nbsp;$total_records\">
                          <i class='fas fa-chevron-left'>&nbsp;Previous</i></a>
                        </li>";
	   } 
	else 
	   {
	    echo "<li class='page-item disabled'>
                          <a class='page-link' href='#'>
                          <i class='fas fa-chevron-left'>&nbsp;Previous</i></a>
                        </li>"; 
	   } 	

                  /*  #################-----Previous Link Area End------###############  */
				  /*  #################-----Dynamic Link Area Begin-----###############  */

		       $current_page_number -= 1;      /*  This is shifted to its original position 
			                                       in order to gets our functionality.    */
			   $initial_value = 0;          //This variable will contain the initial value of y.								   
			
			if($current_page_number < 0)
			 {
			   $current_page_number = 0;       /*  Less than 0 is not applicable.  */
			 }    									   
              $y_value = $current_page_number * $limit_per_page; //To start actual page links number 
	      if($y_value < 0)
	         {
			   $y_value=0;	                 //Y value mean to calculate the offset of the next page.
			 }  
	          if(($current_page_number==1 && $clicked_link ==1) || ($current_page_number <= $link_pages && $clicked_link == 1))
			  {   
			     $show_link_numbers = 1;       //This will show the desktop link numbers.
				// echo "The show link numbers is ".$show_link_numbers;
			  }
			 // echo "I Will Be Here";
			  //echo "The clicked link is".$clickec_link;
			  
			if( $actual_clicked_link >= 2 && $actual_clicked_link < $link_pages) 
			     { 
				// echo "I am Inside";
			       $reduce_page_no = 0;
				   $i= $clicked_link;
				   while($i != 1 )
				      {
				         $reduce_page_no++;
				         $i--;
				      }
				   $show_link_numbers = $current_page_number - $reduce_page_no + 1;
				   $initial_value = ($show_link_numbers - 1) * $limit_per_page;
			    }
			
			  $current_page_number += 1;    //Original Page Number to be printed
		      $clicked_link_counter = 1;    //This will count all the links.
			  		 
		  if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )	  				
             {
			 $show_link_numbers = $actual_page_number;
			 $initial_value = $actual_offset;
			 }
			 
          if($actual_clicked_link < $link_pages && $current_page_number > $link_pages)
		    {   $just_to_count_links =0;
			for($u = $actual_clicked_link; $u >= 1; $u--)
			   {
			     $just_to_count_links++;
			   }
			   //echo "the links are ".$just_to_count_links;
			   $show_link_numbers = $current_page_number - $just_to_count_links + 1;
			   $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
			}		   	 
				
				//The case when the last link number is clicked and it is the last link number then.
			if( $actual_clicked_link == $link_pages && $current_page_number == $available_links )
				{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
				}
				//End of the special case to be created at this time event.
				
			if($clicked_link == $link_pages && $current_page_number != $available_links && ($current_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $show_link_numbers = $current_page_number - $local_count + 1;
					$initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
			   }	
			         //When you click at the first place.
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
				  
			    }
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  $next_clicked_link = $actual_page_number + 1;
			   }	
			if($show_link_numbers < 1)
			   {
			     $show_link_numbers = 1;
				 $initial_value = 0;
			   }		
        for($y = $initial_value; $y < $total_records; $y += $limit_per_page)  // i am writing $y=0 inplace of $y = $y_value
          {
              		   
		   if($clicked_link_counter <= $link_pages )
			 { 
                 /********Begin Area to calculate the start and last of title 'tooltip'*******/
				           
						   $title_page_start = $y + 1;   //Start title page.
						   $title_page_end   = $y + $limit_per_page;  //end title page.
						   
			       if($show_link_numbers==$available_links)
				      {    
					    if($title_page_end > $total_records)
						  {
						   $title_page_end=$total_records;  //Maximum title of the last page will be total records.
						  }
					  }
             if($y <> $end )                   // It will check either it should not be a current page.
		         {
			      echo " <li class='page-item'>
                          <a class='page-link' href=\"$url&offset=$y&clicked_link=$clicked_link_counter\">&nbsp;".$show_link_numbers." &nbsp;&nbsp;</a>
                        </li>"; 
                 }
		     else         /*  Else case to check if it is the current page, display without active link. */
		        {
			     echo "<li class='page-item'>
                          <a class='page-link' href='#' >&nbsp;".$show_link_numbers." &nbsp;&nbsp;</a>
                        </li>";
			    } 
			}                            //End check to control the number of links per page.            
				
			  $show_link_numbers++;      //To get the next link number.
			  $clicked_link_counter++;   //To get next number clicked link number.
	  
		  }          //End of For Loop Brace Here.
				   if($actual_clicked_link==2 && $offset==0)
				      {
					    $next_clicked_link = $actual_link; //For the first time to enter in the paging area.
					  }   
                      $next_title_start = $actual_offset + $limit_per_page + 1;                    //next link page start page
			          $next_title_end   = $next_title_start + $limit_per_page - 1;           //next link page start page
				   
				   if($next_title_end > $total_records )
				      {
					   $next_title_end = $total_records;
					  }    
                 if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links)
                     {
	                   $next_clicked_link = 2;
                     }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $next_clicked_link = $link_pages - $local_count + 2;
				  }	
					 if($next_clicked_link > $link_pages)
					    {
						$next_clicked_link = $link_pages;
						}
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $next_clicked_link = 2;
			    }		 
						
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $next_clicked_link = $local_count + 1;
			   }	
	       	if($this_is < $total_records) {
			   echo "<li class='page-item active'>
                          <a class='page-link' href=\"$url&offset=$next&clicked_link=$next_clicked_link\" title=\"Records&nbsp;From&nbsp;1&nbsp;To&nbsp;$limit_per_page&nbsp;of&nbsp;$total_records\">
                          <i class='fas fa-chevron-right'>&nbsp;Next</i></a>
                        </li>";
			 }      else    {
			   echo "<li class='page-item disabled'>
                          <a class='page-link' href='#' >
                          <i class='fas fa-chevron-right'>&nbsp;Next</i></a>
                        </li>"; 
			 }  
                  $Calculate_total_records_of_available_links = $available_links * $limit_per_page;     
				  $Calculate_total_records_of_available_links = $Calculate_total_records_of_available_links - $limit_per_page; 
					
					if( $link_pages > $available_links )
					  {
					    $link_pages=$available_links;   //To control the link of the last page.
					  }
					  
				 $start_last_title = ( $available_links - 1 ) * $limit_per_page + 1;	   //Start title of the last link.
				 
					  	
          if($next <= $Calculate_total_records_of_available_links)   /* To check either it is the link of last page or not. */
		     {
	          echo "<li class='page-item active'>
                          <a class='page-link' href=\"$url&offset=$Calculate_total_records_of_available_links&clicked_link=$link_pages\" title=\"Records&nbsp;From&nbsp;1&nbsp;To&nbsp;$limit_per_page&nbsp;of&nbsp;$total_records\">
                          <i class='fas fa-chevron-right'>&nbsp;Last</i></a>
                        </li>";
			 }
	      else
		     {
	          echo " <li class='page-item disabled'>
                          <a class='page-link' href='' >
                          <i class='fas fa-chevron-right'>&nbsp;Last</i></a>
                        </li>"; 
			 } 
     		      /*  ###################-----Last Link Area End-----################  */
              echo  "</ul>
                    </nav>
                  </div>";
             
			   /********************* End of the Display Procedure Function ********************/

   }   //End of pagingNewStyleFinal function.


   
    function pagingNewStyleFinalnew($url,$offset,$clicked_link,$total_records,$total_records_per_page) 
   { 
		if($clicked_link=='') 
		 {
	 		$clicked_link = 1;  //For the first time to enter
	   }       
		 $limit_per_page = $total_records_per_page;//This constant will contain how many records will be shown on the current page.
		 $link_pages     = LINK_PAGES;   //This constant will show how many links will be available at a time at each page. 
		 $current_page_number  = $offset / $limit_per_page;  //This constant will provide the current page number;
		 $current_page_number  = intval($current_page_number); //This function will provide the integer part in case of wrong offset.
		 $current_page_number += 1;                     //This will show the actual page number.
		 $next_page_number     = $current_page_number + 1;               //This will contain the next page number.
		 $back_page_number     = $current_page_number - 1;               //This will contain the old page number.
		 $next_clicked_link    = $clicked_link + 1;                      //This will store the next link clicked value.
		 $back_clicked_link    = $clicked_link - 1;                      //This will store the back link clicked value.
		 $available_links      = ceil($total_records / $limit_per_page); //This will define the total links.
		 $actual_page_number   = $current_page_number;                   //This variable will save the number as in calculating from offset.
		 $actual_clicked_link  = $clicked_link;                          //This variable will save the number as in coming from address bar.
		 $actual_offset        = $offset;                                //This variable will store the original offset of the page.

		           //For a Previous Page Procedure
	    if($back_clicked_link < 1 )
		  {
		    $back_clicked_link = 1;                                     //Less than 1 is not allowed.
		  }
		if($back_page_number < 1 )
		 {
		    $back_page_number = 1;                                      // Less than 1 is not allowed.
		 }	    
		                      
							  /*********** Begin Save Actual Page Number & Clicked_link ***********/
		                          
							  /*********** End Save Actual Page Number & Clicked_link ***********/
							  
	if(!isset($offset)|| $offset=="" || $offset < 0) // If you are coming for the first time on the concerned page.
   {
	  $offset=0;                  //It is basically an offset address of the records to be shown.
	 }	
	 $end=$offset-0;              //This constant is another copy of offset but used in limit case.
 $this_is=$end+$limit_per_page; //This will be used at the end to check the Next Link of the page either it should be hyperlinked or not.
 $back=$end- $limit_per_page;   //Similar to the next case, it will be used for the Previous Link either it should be hyperlinked or non-hyperlink.
 $next=$end+ $limit_per_page;   //This will contain the offset of the next link following the current link.
         
           /************* Supporting Area Either Accessing Page From First or Last ***********/
		     if($clicked_link==1 && $current_page_number != 1)
		       {  
			     $link_access='back';
			   }
		     else
		       {
			     $link_access='forward';
			   }  
 
     echo  "<table  width=\"100%\">";
     echo  "<tr><td align=right>";

                      /*  #################-----First Link Area Begin------###############  */
	 if($offset!=0)                                         
	     {
		  echo "&nbsp;<a href=\"$url&offset=0&clicked_link=1\" title=\"Records&nbsp;From&nbsp;1&nbsp;To&nbsp;$limit_per_page&nbsp;of&nbsp;$total_records\"><font  style='FONT-SIZE: 12px'><u>First</u>&nbsp;&nbsp;</font></a>";
		 } 
	 else
	     {
	      echo "&nbsp;<font style='FONT-SIZE: 12px'>First&nbsp;&nbsp;</font>"; 
		 } 
                     /*  #################-----First Link Area End------###############  */		 
		 
                    /*  #################-----Previous Link Area Begin------###############  */
					
					             /*   Start To calculate the title tooltips     */
			             //No Need of Check less than 0, because it will be alreadly de-active. (optionally Given).
				 if($offset != 0 )
				   {			  
					$back_title_start = $offset-$limit_per_page + 1;           //Begin Record number in the tool tip.
					$back_title_end   = $back_title_start + $limit_per_page-1; //End Record Number in the tool tip.
		           }  
						         /*   End To calculate the title tooltips       */
			    if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )
				   {
				     //$link_access = 'back';
				   //$back_clicked_link = 1;
				   }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $back_clicked_link = $link_pages - $local_count + 1;
				  }	
					 		     
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $back_clicked_link = $link_pages - 1;
			    }		 
								
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $back_clicked_link = $local_count - 1;
			   }	
				
						//End of the check to be cached
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  // echo "Hellow ! This is a special case. I am here";
			   //echo "the clicked link is ".$clicked_link;
			  // echo "the next clicked link is ".$next_clicked_link;	
			  $back_clicked_link = $actual_page_number - 1;
			   }	
			if($back_clicked_link < 1)
				   {
				    $back_clicked_link = 1;
				   }				 
			
								 

    if($back >=0) 
	   {                  
   	    echo "&nbsp;<a href=\"$url&offset=$back&clicked_link=$back_clicked_link\" title=\"Records From&nbsp;$back_title_start&nbsp;To&nbsp;$back_title_end&nbsp;of&nbsp;$total_records\"><font style='FONT-SIZE: 12px'> << <u>Previous</u>&nbsp;&nbsp;</font></a>";
	   } 
	else
	   {
	    echo "&nbsp;<font style='FONT-SIZE: 12px'> << Previous&nbsp;&nbsp;</font>"; 
	   } 	

                  /*  #################-----Previous Link Area End------###############  */
				  /*  #################-----Dynamic Link Area Begin-----###############  */

		       $current_page_number -= 1;      /*  This is shifted to its original position 
			                                       in order to gets our functionality.    */
			   $initial_value = 0;          //This variable will contain the initial value of y.								   
			
			if($current_page_number < 0)
			 {
			   $current_page_number = 0;       /*  Less than 0 is not applicable.  */
			 }    									   
              $y_value = $current_page_number * $limit_per_page; //To start actual page links number 
	      if($y_value < 0)
	         {
			   $y_value=0;	                 //Y value mean to calculate the offset of the next page.
			 }  
	          if(($current_page_number==1 && $clicked_link ==1) || ($current_page_number <= $link_pages && $clicked_link == 1))
			  {   
			     $show_link_numbers = 1;       //This will show the desktop link numbers.
				// echo "The show link numbers is ".$show_link_numbers;
			  }
			 // echo "I Will Be Here";
			  //echo "The clicked link is".$clickec_link;
			  
			if( $actual_clicked_link >= 2 && $actual_clicked_link < $link_pages) 
			     { 
				// echo "I am Inside";
			       $reduce_page_no = 0;
				   $i= $clicked_link;
				   while($i != 1 )
				      {
				         $reduce_page_no++;
				         $i--;
				      }
				   $show_link_numbers = $current_page_number - $reduce_page_no + 1;
				   $initial_value = ($show_link_numbers - 1) * $limit_per_page;
			    }
			
			  $current_page_number += 1;    //Original Page Number to be printed
		      $clicked_link_counter = 1;    //This will count all the links.
			  		 
		  if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )	  				
             {
			 $show_link_numbers = $actual_page_number;
			 $initial_value = $actual_offset;
			 }
			 
          if($actual_clicked_link < $link_pages && $current_page_number > $link_pages)
		    {   $just_to_count_links =0;
			for($u = $actual_clicked_link; $u >= 1; $u--)
			   {
			     $just_to_count_links++;
			   }
			   //echo "the links are ".$just_to_count_links;
			   $show_link_numbers = $current_page_number - $just_to_count_links + 1;
			   $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
			}		   	 
				
				//The case when the last link number is clicked and it is the last link number then.
			if( $actual_clicked_link == $link_pages && $current_page_number == $available_links )
				{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
				}
				//End of the special case to be created at this time event.
				
			if($clicked_link == $link_pages && $current_page_number != $available_links && ($current_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $show_link_numbers = $current_page_number - $local_count + 1;
					$initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
			   }	
			         //When you click at the first place.
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
				  
			    }
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  $next_clicked_link = $actual_page_number + 1;
			   }	
			if($show_link_numbers < 1)
			   {
			     $show_link_numbers = 1;
				 $initial_value = 0;
			   }		
        for($y = $initial_value; $y < $total_records; $y += $limit_per_page)  // i am writing $y=0 inplace of $y = $y_value
          {
              		   
		   if($clicked_link_counter <= $link_pages )
			 { 
                 /********Begin Area to calculate the start and last of title 'tooltip'*******/
				           
						   $title_page_start = $y + 1;   //Start title page.
						   $title_page_end   = $y + $limit_per_page;  //end title page.
						   
			       if($show_link_numbers==$available_links)
				      {    
					    if($title_page_end > $total_records)
						  {
						   $title_page_end=$total_records;  //Maximum title of the last page will be total records.
						  }
					  }
             if($y <> $end )                   // It will check either it should not be a current page.
		         {
			      echo "<a href=\"$url&offset=$y&clicked_link=$clicked_link_counter\" title=\"From&nbsp;$title_page_start&nbsp;To&nbsp;$title_page_end&nbsp;of&nbsp;$total_records\"><font style='FONT-SIZE: 12px'>&nbsp;<u>".$show_link_numbers."</u>&nbsp;&nbsp;</font></a>"; 
                 }
		     else         /*  Else case to check if it is the current page, display without active link. */
		        {
			     echo "<font style='FONT-SIZE: 12px'>&nbsp;".$show_link_numbers."&nbsp;&nbsp;</font>";
			    } 
			}                            //End check to control the number of links per page.            
				
			  $show_link_numbers++;      //To get the next link number.
			  $clicked_link_counter++;   //To get next number clicked link number.
	  
		  }          //End of For Loop Brace Here.
				   if($actual_clicked_link==2 && $offset==0)
				      {
					    $next_clicked_link = $actual_link; //For the first time to enter in the paging area.
					  }   
                      $next_title_start = $actual_offset + $limit_per_page + 1;                    //next link page start page
			          $next_title_end   = $next_title_start + $limit_per_page - 1;           //next link page start page
				   
				   if($next_title_end > $total_records )
				      {
					   $next_title_end = $total_records;
					  }    
                 if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links)
                     {
	                   $next_clicked_link = 2;
                     }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $next_clicked_link = $link_pages - $local_count + 2;
				  }	
					 if($next_clicked_link > $link_pages)
					    {
						$next_clicked_link = $link_pages;
						}
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $next_clicked_link = 2;
			    }		 
						
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $next_clicked_link = $local_count + 1;
			   }	
	       	if($this_is < $total_records) {
			   echo "&nbsp;<a href=\"$url&offset=$next&clicked_link=$next_clicked_link\" title=\"Records From&nbsp;$next_title_start&nbsp;To&nbsp;$next_title_end&nbsp;of&nbsp;$total_records\"><font style='FONT-SIZE: 12px'><u>Next</u> >> &nbsp;&nbsp;</font></a>";
			 }      else    {
			   echo "&nbsp;<font style='FONT-SIZE: 12px'>Next >> &nbsp;&nbsp;</font>"; 
			 }  
                  $Calculate_total_records_of_available_links = $available_links * $limit_per_page;     
				  $Calculate_total_records_of_available_links = $Calculate_total_records_of_available_links - $limit_per_page; 
					
					if( $link_pages > $available_links )
					  {
					    $link_pages=$available_links;   //To control the link of the last page.
					  }
					  
				 $start_last_title = ( $available_links - 1 ) * $limit_per_page + 1;	   //Start title of the last link.
				 
					  	
          if($next <= $Calculate_total_records_of_available_links)   /* To check either it is the link of last page or not. */
		     {
	          echo "&nbsp;<a href=\"$url&offset=$Calculate_total_records_of_available_links&clicked_link=$link_pages\" title=\"Records&nbsp;From&nbsp;$start_last_title&nbsp;To&nbsp;$total_records&nbsp;of&nbsp;$total_records\"><font style='FONT-SIZE: 12px'><u>Last</u>&nbsp;&nbsp;</font></a>";
			 }
	      else
		     {
	          echo "&nbsp;<font style='FONT-SIZE: 12px'>&nbsp;Last&nbsp;&nbsp;</font>"; 
			 } 
     		      /*  ###################-----Last Link Area End-----################  */
              echo  "</td></tr>";
              echo "</table>";
			   /********************* End of the Display Procedure Function ********************/

   }   //End of pagingNewStyleFinal function.

   
 function pagingTextStyleFinal($url,$offset,$clicked_link,$total_records,$total_records_per_page,$textClass) 
   { 
		if($clicked_link=='') 
		 {
	 		$clicked_link = 1;  //For the first time to enter
	   }       
 $limit_per_page = $total_records_per_page;//This constant will contain how many records will be shown on the current page.
 $link_pages     = LINK_PAGES;   //This constant will show how many links will be available at a time at each page.
 $current_page_number  = $offset / $limit_per_page;  //This constant will provide the current page number;
 $current_page_number  = intval($current_page_number); //This function will provide the integer part in case of wrong offset.
 $current_page_number += 1;                     //This will show the actual page number.
 $next_page_number     = $current_page_number + 1;               //This will contain the next page number.
 $back_page_number     = $current_page_number - 1;               //This will contain the old page number.
 $next_clicked_link    = $clicked_link + 1;                      //This will store the next link clicked value.
 $back_clicked_link    = $clicked_link - 1;                      //This will store the back link clicked value.
 $available_links      = ceil($total_records / $limit_per_page); //This will define the total links.
 $actual_page_number   = $current_page_number;                   //This variable will save the number as in calculating from offset.
 $actual_clicked_link  = $clicked_link;                          //This variable will save the number as in coming from address bar.
 $actual_offset        = $offset;                                //This variable will store the original offset of the page.

		           //For a Previous Page Procedure
	    if($back_clicked_link < 1 )
		  {
		    $back_clicked_link = 1;                                     //Less than 1 is not allowed.
		  }
		if($back_page_number < 1 )
		 {
		    $back_page_number = 1;                                      // Less than 1 is not allowed.
		 }	    
		                      
							  /*********** Begin Save Actual Page Number & Clicked_link ***********/
		                          
							  /*********** End Save Actual Page Number & Clicked_link ***********/
							  
	if(!isset($offset)|| $offset=="" || $offset < 0) // If you are coming for the first time on the concerned page.
   {
	  $offset=0;                  //It is basically an offset address of the records to be shown.
	 }	
	 $end=$offset-0;              //This constant is another copy of offset but used in limit case.
 $this_is=$end+$limit_per_page; //This will be used at the end to check the Next Link of the page either it should be hyperlinked or not.
 $back=$end- $limit_per_page;   //Similar to the next case, it will be used for the Previous Link either it should be hyperlinked or non-hyperlink.
 $next=$end+ $limit_per_page;   //This will contain the offset of the next link following the current link.
         
           /************* Supporting Area Either Accessing Page From First or Last ***********/
		     if($clicked_link==1 && $current_page_number != 1)
		       {  
			     $link_access='back';
			   }
		     else
		       {
			     $link_access='forward';
			   }  
 
     echo  "<table  width=\"100%\">";
     echo  "<tr><td align=right>";

                      /*  #################-----First Link Area Begin------###############  */
	 if($offset!=0)                                         
	     {
		  echo "<a href=\"$url&offset=0&clicked_link=1\" title=\"Records From 1 To$limit_per_page&nbsp;of&nbsp;$total_records\" class='$textClass'><strong><u>First</u></strong></a>";
		 } 
	 else
	     {
	      echo "<strong class='$textClass'>First</strong>"; 
		 } 
                     /*  #################-----First Link Area End------###############  */		 
		 
                    /*  #################-----Previous Link Area Begin------###############  */
					
					             /*   Start To calculate the title tooltips     */
			             //No Need of Check less than 0, because it will be alreadly de-active. (optionally Given).
				 if($offset != 0 )
				   {			  
					$back_title_start = $offset-$limit_per_page + 1;           //Begin Record number in the tool tip.
					$back_title_end   = $back_title_start + $limit_per_page-1; //End Record Number in the tool tip.
		           }  
						         /*   End To calculate the title tooltips       */
			    if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )
				   {
				     //$link_access = 'back';
				   //$back_clicked_link = 1;
				   }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $back_clicked_link = $link_pages - $local_count + 1;
				  }	
					 		     
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $back_clicked_link = $link_pages - 1;
			    }		 
								
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $back_clicked_link = $local_count - 1;
			   }	
				
						//End of the check to be cached
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  // echo "Hellow ! This is a special case. I am here";
			   //echo "the clicked link is ".$clicked_link;
			  // echo "the next clicked link is ".$next_clicked_link;	
			  $back_clicked_link = $actual_page_number - 1;
			   }	
			if($back_clicked_link < 1)
				   {
				    $back_clicked_link = 1;
				   }				 
			
								 

    if($back >=0) 
	   {                  
   	    echo "<a href=\"$url&offset=$back&clicked_link=$back_clicked_link\" title=\"Records From&nbsp;$back_title_start&nbsp;To&nbsp;$back_title_end&nbsp;of&nbsp;$total_records\" class='$textClass'><strong> << <u>Previous</u></strong></a>";
	   } 
	else
	   {
	    echo "<strong class='$textClass'> << Previous</strong>"; 
	   } 	

                  /*  #################-----Previous Link Area End------###############  */
				  /*  #################-----Dynamic Link Area Begin-----###############  */

		       $current_page_number -= 1;      /*  This is shifted to its original position 
			                                       in order to gets our functionality.    */
			   $initial_value = 0;          //This variable will contain the initial value of y.								   
			
			if($current_page_number < 0)
			 {
			   $current_page_number = 0;       /*  Less than 0 is not applicable.  */
			 }    									   
              $y_value = $current_page_number * $limit_per_page; //To start actual page links number 
	      if($y_value < 0)
	         {
			   $y_value=0;	                 //Y value mean to calculate the offset of the next page.
			 }  
	          if(($current_page_number==1 && $clicked_link ==1) || ($current_page_number <= $link_pages && $clicked_link == 1))
			  {   
			     $show_link_numbers = 1;       //This will show the desktop link numbers.
				// echo "The show link numbers is ".$show_link_numbers;
			  }
			 // echo "I Will Be Here";
			  //echo "The clicked link is".$clickec_link;
			  
			if( $actual_clicked_link >= 2 && $actual_clicked_link < $link_pages) 
			     { 
				// echo "I am Inside";
			       $reduce_page_no = 0;
				   $i= $clicked_link;
				   while($i != 1 )
				      {
				         $reduce_page_no++;
				         $i--;
				      }
				   $show_link_numbers = $current_page_number - $reduce_page_no + 1;
				   $initial_value = ($show_link_numbers - 1) * $limit_per_page;
			    }
			
			  $current_page_number += 1;    //Original Page Number to be printed
		      $clicked_link_counter = 1;    //This will count all the links.
			  		 
		  if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )	  				
             {
			 $show_link_numbers = $actual_page_number;
			 $initial_value = $actual_offset;
			 }
			 
          if($actual_clicked_link < $link_pages && $current_page_number > $link_pages)
		    {   $just_to_count_links =0;
			for($u = $actual_clicked_link; $u >= 1; $u--)
			   {
			     $just_to_count_links++;
			   }
			   //echo "the links are ".$just_to_count_links;
			   $show_link_numbers = $current_page_number - $just_to_count_links + 1;
			   $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
			}		   	 
				
				//The case when the last link number is clicked and it is the last link number then.
			if( $actual_clicked_link == $link_pages && $current_page_number == $available_links )
				{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
				}
				//End of the special case to be created at this time event.
				
			if($clicked_link == $link_pages && $current_page_number != $available_links && ($current_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $show_link_numbers = $current_page_number - $local_count + 1;
					$initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
			   }	
			         //When you click at the first place.
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
				  
			    }
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  $next_clicked_link = $actual_page_number + 1;
			   }	
			if($show_link_numbers < 1)
			   {
			     $show_link_numbers = 1;
				 $initial_value = 0;
			   }		
        for($y = $initial_value; $y < $total_records; $y += $limit_per_page)  // i am writing $y=0 inplace of $y = $y_value
          {
              		   
		   if($clicked_link_counter <= $link_pages )
			 { 
                 /********Begin Area to calculate the start and last of title 'tooltip'*******/
				           
						   $title_page_start = $y + 1;   //Start title page.
						   $title_page_end   = $y + $limit_per_page;  //end title page.
						   
			       if($show_link_numbers==$available_links)
				      {    
					    if($title_page_end > $total_records)
						  {
						   $title_page_end=$total_records;  //Maximum title of the last page will be total records.
						  }
					  }
             if($y <> $end )                   // It will check either it should not be a current page.
		         {
			      echo "<a href=\"$url&offset=$y&clicked_link=$clicked_link_counter\" title=\"From&nbsp;$title_page_start&nbsp;To&nbsp;$title_page_end&nbsp;of&nbsp;$total_records\" class='$textClass'><strong>&nbsp;<u>".$show_link_numbers."</u>&nbsp;</strong></a>"; 
                 }
		     else         /*  Else case to check if it is the current page, display without active link. */
		        {
			     echo "<strong class='$textClass'>&nbsp;".$show_link_numbers."&nbsp;</strong>";
			    } 
			}                            //End check to control the number of links per page.            
				
			  $show_link_numbers++;      //To get the next link number.
			  $clicked_link_counter++;   //To get next number clicked link number.
	  
		  }          //End of For Loop Brace Here.
				   if($actual_clicked_link==2 && $offset==0)
				      {
					    $next_clicked_link = $actual_link; //For the first time to enter in the paging area.
					  }   
                      $next_title_start = $actual_offset + $limit_per_page + 1;                    //next link page start page
			          $next_title_end   = $next_title_start + $limit_per_page - 1;           //next link page start page
				   
				   if($next_title_end > $total_records )
				      {
					   $next_title_end = $total_records;
					  }    
                 if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links)
                     {
	                   $next_clicked_link = 2;
                     }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $next_clicked_link = $link_pages - $local_count + 2;
				  }	
					 if($next_clicked_link > $link_pages)
					    {
						$next_clicked_link = $link_pages;
						}
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $next_clicked_link = 2;
			    }		 
						
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $next_clicked_link = $local_count + 1;
			   }	
	       	if($this_is < $total_records) {
			   echo "&nbsp;<a href=\"$url&offset=$next&clicked_link=$next_clicked_link\" title=\"Records From&nbsp;$next_title_start&nbsp;To&nbsp;$next_title_end&nbsp;of&nbsp;$total_records\" class='$textClass'><strong><u>Next</u> >></strong></a>";
			 }      else    {
			   echo "<strong class='$textClass'>Next >> &nbsp;</strong>"; 
			 }  
                  $Calculate_total_records_of_available_links = $available_links * $limit_per_page;     
				  $Calculate_total_records_of_available_links = $Calculate_total_records_of_available_links - $limit_per_page; 
					
					if( $link_pages > $available_links )
					  {
					    $link_pages=$available_links;   //To control the link of the last page.
					  }
					  
				 $start_last_title = ( $available_links - 1 ) * $limit_per_page + 1;	   //Start title of the last link.
				 
					  	
          if($next <= $Calculate_total_records_of_available_links)   /* To check either it is the link of last page or not. */
		     {
	          echo "<a href=\"$url&offset=$Calculate_total_records_of_available_links&clicked_link=$link_pages\" title=\"Records&nbsp;From&nbsp;$start_last_title&nbsp;To&nbsp;$total_records&nbsp;of&nbsp;$total_records\" class='$textClass'><strong>&nbsp;<u>Last</u></strong></a>";
			 }
	      else
		     {
	          echo "<strong class='$textClass'>Last</strong>"; 
			 } 
     		      /*  ###################-----Last Link Area End-----################  */
              echo  "</td></tr>";
              echo "</table>";
			   /********************* End of the Display Procedure Function ********************/

   }   //End of pagingTextStyleFinal function.
   
 function pagingTextStyleFinal_client($url,$offset,$clicked_link,$total_records,$total_records_per_page,$textClass) 
   { 
		if($clicked_link=='') 
		 {
	 		$clicked_link = 1;  //For the first time to enter
	   }       
 $limit_per_page = $total_records_per_page;//This constant will contain how many records will be shown on the current page.
 $link_pages     = LINK_PAGES;   //This constant will show how many links will be available at a time at each page.
 $current_page_number  = $offset / $limit_per_page;  //This constant will provide the current page number;
 $current_page_number  = intval($current_page_number); //This function will provide the integer part in case of wrong offset.
 $current_page_number += 1;                     //This will show the actual page number.
 $next_page_number     = $current_page_number + 1;               //This will contain the next page number.
 $back_page_number     = $current_page_number - 1;               //This will contain the old page number.
 $next_clicked_link    = $clicked_link + 1;                      //This will store the next link clicked value.
 $back_clicked_link    = $clicked_link - 1;                      //This will store the back link clicked value.
 $available_links      = ceil($total_records / $limit_per_page); //This will define the total links.
 $actual_page_number   = $current_page_number;                   //This variable will save the number as in calculating from offset.
 $actual_clicked_link  = $clicked_link;                          //This variable will save the number as in coming from address bar.
 $actual_offset        = $offset;                                //This variable will store the original offset of the page.

		           //For a Previous Page Procedure
	    if($back_clicked_link < 1 )
		  {
		    $back_clicked_link = 1;                                     //Less than 1 is not allowed.
		  }
		if($back_page_number < 1 )
		 {
		    $back_page_number = 1;                                      // Less than 1 is not allowed.
		 }	    
		                      
							  /*********** Begin Save Actual Page Number & Clicked_link ***********/
		                          
							  /*********** End Save Actual Page Number & Clicked_link ***********/
							  
	if(!isset($offset)|| $offset=="" || $offset < 0) // If you are coming for the first time on the concerned page.
   {
	  $offset=0;                  //It is basically an offset address of the records to be shown.
	 }	
	 $end=$offset-0;              //This constant is another copy of offset but used in limit case.
 $this_is=$end+$limit_per_page; //This will be used at the end to check the Next Link of the page either it should be hyperlinked or not.
 $back=$end- $limit_per_page;   //Similar to the next case, it will be used for the Previous Link either it should be hyperlinked or non-hyperlink.
 $next=$end+ $limit_per_page;   //This will contain the offset of the next link following the current link.
         
           /************* Supporting Area Either Accessing Page From First or Last ***********/
		     if($clicked_link==1 && $current_page_number != 1)
		       {  
			     $link_access='back';
			   }
		     else
		       {
			     $link_access='forward';
			   }  
 
     echo  "<table  width=\"100%\">";
     echo  "<tr style='float:right'><td style='float:right' valign='middle'>";

                      /*  #################-----First Link Area Begin------###############  */
	 if($offset!=0)                                         
	     {
		  echo "&nbsp;<li class='$textClass'><a href=\"$url&offset=0&clicked_link=1\" title=\"Records&nbsp;From&nbsp;1&nbsp;To&nbsp;$limit_per_page&nbsp;of&nbsp;$total_records\" ><img border='none' src='".HOST_URL_IMAGES."/first.gif' alt='First' /></a></li>";
		 } 
	 else
	     {
	      echo "<li class='$textClass'><img border='none' src='".HOST_URL_IMAGES."/no-first.gif' alt='First' /></li>"; 
		 } 
                     /*  #################-----First Link Area End------###############  */		 
		 
                    /*  #################-----Previous Link Area Begin------###############  */
					
					             /*   Start To calculate the title tooltips     */
			             //No Need of Check less than 0, because it will be alreadly de-active. (optionally Given).
				 if($offset != 0 )
				   {			  
					$back_title_start = $offset-$limit_per_page + 1;           //Begin Record number in the tool tip.
					$back_title_end   = $back_title_start + $limit_per_page-1; //End Record Number in the tool tip.
		           }  
						         /*   End To calculate the title tooltips       */
			    if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )
				   {
				     //$link_access = 'back';
				   //$back_clicked_link = 1;
				   }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $back_clicked_link = $link_pages - $local_count + 1;
				  }	
					 		     
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $back_clicked_link = $link_pages - 1;
			    }		 
								
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $back_clicked_link = $local_count - 1;
			   }	
				
						//End of the check to be cached
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  // echo "Hellow ! This is a special case. I am here";
			   //echo "the clicked link is ".$clicked_link;
			  // echo "the next clicked link is ".$next_clicked_link;	
			  $back_clicked_link = $actual_page_number - 1;
			   }	
			if($back_clicked_link < 1)
				   {
				    $back_clicked_link = 1;
				   }				 
			
								 

    if($back >=0) 
	   {                  
   	    echo "&nbsp;<li class='$textClass'><a href=\"$url&offset=$back&clicked_link=$back_clicked_link\" title=\"Records From&nbsp;$back_title_start&nbsp;To&nbsp;$back_title_end&nbsp;of&nbsp;$total_records\" ><img border='none' src='".HOST_URL_IMAGES."/prev.gif' alt='Previous' /></a></li>";
	   } 
	else
	   {
	    echo "<li class='$textClass'><img border='none' src='".HOST_URL_IMAGES."/no-prev.gif' alt='Previous' /></li>"; 
	   } 	

                  /*  #################-----Previous Link Area End------###############  */
				  /*  #################-----Dynamic Link Area Begin-----###############  */

		       $current_page_number -= 1;      /*  This is shifted to its original position 
			                                       in order to gets our functionality.    */
			   $initial_value = 0;          //This variable will contain the initial value of y.								   
			
			if($current_page_number < 0)
			 {
			   $current_page_number = 0;       /*  Less than 0 is not applicable.  */
			 }    									   
              $y_value = $current_page_number * $limit_per_page; //To start actual page links number 
	      if($y_value < 0)
	         {
			   $y_value=0;	                 //Y value mean to calculate the offset of the next page.
			 }  
	          if(($current_page_number==1 && $clicked_link ==1) || ($current_page_number <= $link_pages && $clicked_link == 1))
			  {   
			     $show_link_numbers = 1;       //This will show the desktop link numbers.
				// echo "The show link numbers is ".$show_link_numbers;
			  }
			 // echo "I Will Be Here";
			  //echo "The clicked link is".$clickec_link;
			  
			if( $actual_clicked_link >= 2 && $actual_clicked_link < $link_pages) 
			     { 
				// echo "I am Inside";
			       $reduce_page_no = 0;
				   $i= $clicked_link;
				   while($i != 1 )
				      {
				         $reduce_page_no++;
				         $i--;
				      }
				   $show_link_numbers = $current_page_number - $reduce_page_no + 1;
				   $initial_value = ($show_link_numbers - 1) * $limit_per_page;
			    }
			
			  $current_page_number += 1;    //Original Page Number to be printed
		      $clicked_link_counter = 1;    //This will count all the links.
			  		 
		  if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links )	  				
             {
			 $show_link_numbers = $actual_page_number;
			 $initial_value = $actual_offset;
			 }
			 
          if($actual_clicked_link < $link_pages && $current_page_number > $link_pages)
		    {   $just_to_count_links =0;
			for($u = $actual_clicked_link; $u >= 1; $u--)
			   {
			     $just_to_count_links++;
			   }
			   //echo "the links are ".$just_to_count_links;
			   $show_link_numbers = $current_page_number - $just_to_count_links + 1;
			   $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
			}		   	 
				
				//The case when the last link number is clicked and it is the last link number then.
			if( $actual_clicked_link == $link_pages && $current_page_number == $available_links )
				{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;   //To calculate the offset of the clicked link.
				}
				//End of the special case to be created at this time event.
				
			if($clicked_link == $link_pages && $current_page_number != $available_links && ($current_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $show_link_numbers = $current_page_number - $local_count + 1;
					$initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
			   }	
			         //When you click at the first place.
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $show_link_numbers = $current_page_number - $link_pages + 1;
				  $initial_value = ( $show_link_numbers - 1 ) * $limit_per_page;
				  
			    }
			if($clicked_link==1 && $actual_page_number < $link_pages)
			   {
			  $next_clicked_link = $actual_page_number + 1;
			   }	
			if($show_link_numbers < 1)
			   {
			     $show_link_numbers = 1;
				 $initial_value = 0;
			   }		
        for($y = $initial_value; $y < $total_records; $y += $limit_per_page)  // i am writing $y=0 inplace of $y = $y_value
          {
              		   
		   if($clicked_link_counter <= $link_pages )
			 { 
                 /********Begin Area to calculate the start and last of title 'tooltip'*******/
				           
						   $title_page_start = $y + 1;   //Start title page.
						   $title_page_end   = $y + $limit_per_page;  //end title page.
						   
			       if($show_link_numbers==$available_links)
				      {    
					    if($title_page_end > $total_records)
						  {
						   $title_page_end=$total_records;  //Maximum title of the last page will be total records.
						  }
					  }
             if($y <> $end )                   // It will check either it should not be a current page.
		         {
			      echo "<li class='$textClass'><a href=\"$url&offset=$y&clicked_link=$clicked_link_counter\" title=\"From&nbsp;$title_page_start&nbsp;To&nbsp;$title_page_end&nbsp;of&nbsp;$total_records\" ><strong>".$show_link_numbers."</strong></a></li><li style='list-style: none;float:left; text-decoration: none;'><img border='none' src='".HOST_URL_IMAGES."/no-line.gif' /></li>"; 
                 }
		     else         /*  Else case to check if it is the current page, display without active link. */
		        {
			     echo "<li class='$textClass'>".$show_link_numbers."</li><li style='list-style: none;float:left; text-decoration: none;'><img border='none' src='".HOST_URL_IMAGES."/no-line.gif' /></li>";
			    } 
			}                            //End check to control the number of links per page.            
				
			  $show_link_numbers++;      //To get the next link number.
			  $clicked_link_counter++;   //To get next number clicked link number.
	  
		  }          //End of For Loop Brace Here.
				   if($actual_clicked_link==2 && $offset==0)
				      {
					    $next_clicked_link = $actual_link; //For the first time to enter in the paging area.
					  }   
                      $next_title_start = $actual_offset + $limit_per_page + 1;                    //next link page start page
			          $next_title_end   = $next_title_start + $limit_per_page - 1;           //next link page start page
				   
				   if($next_title_end > $total_records )
				      {
					   $next_title_end = $total_records;
					  }    
                 if($actual_clicked_link == $link_pages && $link_access=='forward' && ($actual_page_number + $link_pages - 1) <= $available_links)
                     {
	                   $next_clicked_link = 2;
                     }
				if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			        {  
			          $local_count = 0;
			          $i = $actual_page_number + $link_pages;
			       while( $i != $available_links)
				         {
					       $local_count++;
						   $i--;
					     }
			         //  echo "the local count is " .$local_count;
				        $next_clicked_link = $link_pages - $local_count + 2;
				  }	
					 if($next_clicked_link > $link_pages)
					    {
						$next_clicked_link = $link_pages;
						}
			if( $clicked_link == 1 && $current_page_number >= $link_pages )
		    	{
				  $next_clicked_link = 2;
			    }		 
						
						//Check when you click the last clicked number and remaining links are less than $link_pages
					if($clicked_link == $link_pages && $actual_page_number != $available_links && ($actual_page_number + $link_pages) > $available_links )
			   {   $local_count = 0;			   
			        $i = $current_page_number + $link_pages;
			     while( $i != $available_links)
				      {
					     $local_count++;
						 $i--;
					  }
			       // echo "the local count is " .$local_count;
				    $next_clicked_link = $local_count + 1;
			   }	
	       	if($this_is < $total_records) {
			   echo "&nbsp;<li class='$textClass'><a href=\"$url&offset=$next&clicked_link=$next_clicked_link\" title=\"Records From&nbsp;$next_title_start&nbsp;To&nbsp;$next_title_end&nbsp;of&nbsp;$total_records\" ><img border='none' src='".HOST_URL_IMAGES."/next.gif' alt='Next' /></a></li>";
			 }      else    {
			   echo "<li class='$textClass'><img border='none' src='".HOST_URL_IMAGES."/no-next.gif' alt='Next' /></li>"; 
			 }  
                  $Calculate_total_records_of_available_links = $available_links * $limit_per_page;     
				  $Calculate_total_records_of_available_links = $Calculate_total_records_of_available_links - $limit_per_page; 
					
					if( $link_pages > $available_links )
					  {
					    $link_pages=$available_links;   //To control the link of the last page.
					  }
					  
				 $start_last_title = ( $available_links - 1 ) * $limit_per_page + 1;	   //Start title of the last link.
				 
					  	
          if($next <= $Calculate_total_records_of_available_links)   /* To check either it is the link of last page or not. */
		     {
	          echo "&nbsp;<li class='$textClass'><a href=\"$url&offset=$Calculate_total_records_of_available_links&clicked_link=$link_pages\" title=\"Records&nbsp;From&nbsp;$start_last_title&nbsp;To&nbsp;$total_records&nbsp;of&nbsp;$total_records\" ><img border='none' src='".HOST_URL_IMAGES."/last.gif' alt='Last' /></a></li>";
			 }
	      else
		     {
	          echo "<li class='$textClass'><img border='none' src='".HOST_URL_IMAGES."/no-last.gif' alt='Last' /></li>"; 
			 } 
     		      /*  ###################-----Last Link Area End-----################  */
              echo  "</td></tr>";
              echo "</table>";
			   /********************* End of the Display Procedure Function ********************/

   }

} //End Class Brace.

/************************************ CSV Class *****************************************/

class Database_CSV {
    
	/**
    * Table to extract data from
    * @var string
    */
    private $table = '';
	
	/**
    * SQL statement to use (instead of specifying a $table)
    * @var string
    */
	private $sql = '';
	
	/**
    * Fields in the table
    * @var array
    */
    private $fields = array();
	
	/**
    * Default file name for exporting, can be over-ridden
    * @var string
    */
	private $file_name = 'export.csv';
	
	/**
    * Fields that will be ignored before the export
    * @var array
    */
	private $ignore_fields = array();
	
	/**
    * Fields that will be renamed before the export
    * @var array
    */
	private $rename_fields = array();
	
	/**
    * Take fields and rewrite them to be read in a human fashion.  Example: 'first_name' would become 'First Name'
    * @var bool
    */
	private $humanize_fields = false;
	
	/**
    * Do you want it to prompt you to download the file? Do you want it to just store on the server or both?
    * @var string (download, server, both)
    */
	private $output_type = 'download';
	
	/**
    * Array to store errors in if any occur
    * @var array
    */
	private $_errors = array();
	
	/**
    * If export('server') is specified, where are we going to save the file to?
    * @var string
    */
	private $save_to_folder = '';
	
	/**
    * Display errors if there are any
    * @var bool
    */
	private $errors_set = false;
   	
	/**
    * Set a table to grab data from or use an SQL statement
	* @param string: SQL statement or table name
    * @access public
    */
    public function sqlTable($sql_table){
		
		$sel = substr($sql_table,0,6);
		(stristr($sel,'SELECT')) ? $this->sql = $sql_table : $this->table = $sql_table;
			
    }
	
	/**
    * Set fields to ignore (OPTIONAL)
	* @param array: Array of fields to ignore. Example array('id')
    * @access public
    */
	public function ignoreFields($fields){
		
		if(is_array($fields)){
			foreach($fields as $f) $this->ignore_fields[] = $f;
		}
	}
   	
	/**
    * Set fields to rename (OPTIONAL)
	* @param array: Array of fields to rename. Example array('per_recc' => 'Personal Recommendation')
    * @access public
    */
    public function renameFields($fields){
       
       if(is_array($fields)){
			foreach($fields as $f => $rename) $this->rename_fields[$f] = $rename;
	   }
    }
   
   /**
    * Set the field names to a readable format (OPTIONAL)
	* @param bool: Example: 'first_name' would become 'First Name'
    * @access public
    */
    public function humanizeFields($bool){ 
	   $this->humanize_fields = $bool;
    }
	
	/**
    * Set the file name (OPTIONAL)
	* @param bool: Example: 'first_name' would become 'First Name'
    * @access public
    */
	public function fileName($name){
		$this->file_name =  str_replace(array('.csv','_csv'),'',$this->_file_friendly($name)).'.csv';
	}
	
	/**
    * Set if we want to display errors
	* @param bool: True or false
    * @access public
    */
	public function errors($bool){
		$this->errors_set = $bool;
	}
   	
	/**
    * Bundle it into one and let 'er rip 
    * @access public
    */
    public function export($output_type = null){
       
	   	if(isset($output_type)) $this->output_type = $output_type;
        // if we are dealing with one table
        if($this->table){
            $sql = "SELECT * FROM ".$this->table;
        }
        // if we are dealing with an sql statement
        else if($this->sql){
           $sql = $this->sql;
        }
       
        // run it!
        if(!@mysql_query($sql)){
            if($this->errors_set) $this->_set_error('Could not run the query: '.mysql_error());
        } 
		else {
            $this->fields = $this->_fieldNames($sql);
		}
		
		// if their aren't any errors
		if(!$this->_has_errors()){
			
			$top_fields = $this->fields;
			
			// take away fields that we are ignoring
			if($this->ignore_fields){
				foreach($this->ignore_fields as $f){
					$k = array_search($f,$this->fields);
					if(isset($this->fields[$k]))
						unset($this->fields[$k]);
					else
						if($this->errors_set) $this->_set_error('The field: <strong>'.$f.'</strong> does not exist. (function: ignoreFields)');
				}
			}
			
			// rename the fields
			if($this->rename_fields){
				$top_fields = $this->fields;
				$renamed = array(); // we want to remember which fields we renamed, for if they humanize
				foreach($this->rename_fields as $f => $rename){
					$k = array_search($f,$top_fields);
					if(isset($top_fields[$k])){
						$top_fields[$k] = $rename;
						$renamed[$k] = $rename;
					}
					else {
						if($this->errors_set) $this->_set_error('The field: <strong>'.$f.'</strong> does not exist. (function: renameFields)');
					}
				}
			}
			
			// humanize the fields
			if($this->humanize_fields){
				// if they have renamed the fields.. there should not be a conflict
				if(isset($renamed)){
					foreach($this->fields as $k => $field){
						if(!isset($renamed[$k])) $top_fields[$k] = $this->_humanize($field);
					}
				}
				else {
					$top_fields = $this->fields;
					foreach($top_fields as $f){
						$k = array_search($f,$top_fields);
						$top_fields[$k] = $this->_humanize($f);
					}
				}
			}
			
			$tempFields = implode(',',$top_fields)."\n";
			
			$q = mysql_query($sql);
			while($data = mysql_fetch_assoc($q)){
				$row = array();
				foreach($this->fields as $field) $row[] = $data[$field];
				$tempFields .= implode(',',$row)."\n";
			}
			
			if(!$this->_has_errors()){
				$this->_output($tempFields,$this->file_name,$this->output_type);
			}
			else {
				$this->_print_errors();
			}
		}
		else {
			$this->_print_errors();
			
		}
       
    }
   
   
   	/**
    * Send it for output
    * @access private
    */
	public function saveTo($folder){
		
		$f = strrev($folder);
		$slash = (substr($f,0,1) != '/') ? '/' : '';
		$folder = $folder.$slash;
		if(!is_dir($folder)) $this->recursive_mkdir($folder);
		$this->save_to_folder = $folder.$slash;
		
	}
   
   	/**
    * Send it for output
    * @access private
    */
	private function _output($data,$filename,$type){
		
		if($this->_has_errors()) $this->_print_errors();
		// this will put the .csv on the server with the path you specified
		if($type == 'server' || $type == 'both'){
		
			$lines = explode("\n",$data);
			foreach($lines as $line){
				$list[] = $line;
			}
			
			$fp = fopen($this->save_to_folder.$filename, 'w');
			
			foreach ($list as $line) {
				fputcsv($fp, split(',', $line));
			}
			
			fclose($fp);

			if($type == 'both'){
				header('Content-type: application/csv');
				header('Content-Disposition: attachment; filename="'.$filename.'"');
				echo $data;
			}
			
		}
		
		else if($type == 'download' || $type == 'both'){
		
			header('Content-type: application/csv');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			echo $data;
			
		}
		
	}
	
	/**
    * Make the .csv file have legal chars if it is renamed manually
    * @access private
    */
	private function _file_friendly($file){
		return preg_replace(array('/[^\w\s]/', '/\\s+/') , array(' ', '_'), $file);
	}
	
	/**
    * If the field values have a comma, get rid of it.  This needs to be fixed some how
    * @access private
    */
	private function _clean($data){
		$data = str_replace(',','',$data);
		return $data;
	}
	
	/**
    * Alter fields to show up in a human readable format
    * @access private
    */
	private function _humanize($str){
		$str = ucwords(str_replace(array('_'),array(' '),$str));
		return $str;
	}
   	
	/**
    * Append each error to the $_errors array
    * @access private
    */
    private function _set_error($str){
        $this->_errors[] = $str;
    }
	
	/**
    * Print out the errors in text instead of an array
    * @access private
    */
	private function _print_errors(){
	
		$str = '';
		foreach($this->_errors as $e){
			$str .= $e.'<br>';
		}
		echo $str;
		exit;
		
	}
	
	/**
    * Provide a check to see if we have errors
    * @access private
    */
	private function _has_errors(){
		return (count($this->_errors) > 0) ? true : false;
	}
   
   	/**
    * Return a list of each field from the DB
    * @access private
    */
    private function _fieldNames($sql){
        return array_keys(mysql_fetch_assoc(mysql_query($sql)));
    }
	
	/**
    * Allows multiple directories to be made
    * @access private
    */
	private function recursive_mkdir($path, $mode = 0777) {
	
		$dirs = explode('/', $path);
		$count = count($dirs);
		$path = '.';
		
		for ($i = 0; $i < $count; ++$i) {
			$path .= '/'.$dirs[$i];
			if (!is_dir($path) && !mkdir($path, $mode)) {
				return false;
			}
		}
		return true;
	}

}

?>
