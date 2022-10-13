<?php

class Paging
{
	#== Configurable Variables
	var $TOTAL_RECORDS;
	var $RECORDS_PER_PAGE;
	var $PAGELINKS_PER_PAGE;
	var $SPT_SQL_WITH_LIMIT;
	var $SPT_URL_PARAM;
	
	#== Non-Configurable Variables
	var $strErrorMsg;
	var $intCurrentPage;
	var $strJSCode;

	Function Paging($arrParentParam)
	{
		$this->SPT_URL_PARAM = 0;
		if(!is_array($arrParentParam)) $arrParentParam=array();
		#Init the Error Msg
		$this->strErrorMsg ='<table width="100%" border="0" ';
		$this->strErrorMsg.='style="font-family:Verdana;font-size:11px;color:#000000;"><tr>';
		$this->strErrorMsg.='<td width="100%" align="center">';
		$this->strErrorMsg.='Unable to create Smart Paging Technique&copy;&nbsp;[{ERROR}]</td></tr></table>';
		
		#Init the Total Records
		$TotRec=trim($arrParentParam['TOTAL_RECORDS']);
		if(trim($TotRec)=='') die(str_replace('{ERROR}','Total Records are NULL',$this->strErrorMsg)); 
		else $this->TOTAL_RECORDS=(int)$TotRec;
		
		#Init Records Per Page
		$RecPerPage=trim($arrParentParam['RECORDS_PER_PAGE']);
		if($RecPerPage!='') $this->RECORDS_PER_PAGE=$RecPerPage;
		else $this->RECORDS_PER_PAGE=10; #Default Value
		
		#Init Page Links Per Page
		$LinksPerPage=trim($arrParentParam['PAGELINKS_PER_PAGE']);
		if($LinksPerPage1!='') $this->PAGELINKS_PER_PAGE=$LinksPerPage1;
		else $this->PAGELINKS_PER_PAGE=5; #Default Value

		#Init the Current Pagination Page
		$FormValues=array_merge($_POST,$_GET);
		if(trim($FormValues['SPTPage'])=='' OR !isset($FormValues['SPTPage'])) $this->intCurrentPage=1;
		else $this->intCurrentPage=(int) trim($FormValues['SPTPage']);

		#Init the LIMIT Query for the User
		if(($this->intCurrentPage)==1) $LowerLimit=0;
		else $LowerLimit = (($this->intCurrentPage - 1) * $this->RECORDS_PER_PAGE);
		$UpperLimit = $this->RECORDS_PER_PAGE;
		$this->SPT_SQL_WITH_LIMIT = " LIMIT $LowerLimit, $UpperLimit ";

		$this->strJSCode ='<script type="text/javascript">'."\n";
		$this->strJSCode.='<!--'."\n";
		$this->strJSCode.='if(!document.<FUNCTION_NAME>) { ';
		$this->strJSCode.='function <FUNCTION_NAME>() { ';
		$this->strJSCode.=' try { var hndFRM=document.getElementById("<FRM_NAME>"); } catch(e) ';
		$this->strJSCode.='{ alert("Smart Paging Technique [Error: Document.Form is NULL or not an Object]"); '; 
		$this->strJSCode.='return; } ';
		$this->strJSCode.='var URL_Add="<ADD_VALUES>"; var ToPage="?SPTPage="; ';
		$this->strJSCode.='if(<FUNCTION_NAME>.arguments[0]) ToPage+=<FUNCTION_NAME>.arguments[0]; ';
		$this->strJSCode.='hndFRM.action=" "+ToPage+URL_Add; hndFRM.method="POST"; hndFRM.submit(); } ';
		$this->strJSCode.='} '."\n";
		$this->strJSCode.='//--> '."\n";
		$this->strJSCode.='</script>';
	}

	Function fnCreateSPT($arrChildParam)
	{
		
		
		if(!is_array($arrChildParam)) $arrChildParam=array();
		$stmtPlaceSPT = '';

		
		
		#Init the Form Name
		$tmpFormName=trim($arrChildParam['FORM_NAME']);
		# Code commented below have to be placed in Beta Versions only
		#if($tmpFormName!='')
		#{
		#	$sptFormName=$tmpFormName;
		#	$flagFrmAvailable='Y';
		#} else
		#{
		#	$sptFormName=strtoupper(uniqid('frmSPT'));
		#	$flagFrmAvailable='N';
		#}
		if($tmpFormName!='')
		{
			$sptFormName=$tmpFormName;
			$flagFrmAvailable='Y';
		}else die(str_replace('{ERROR}','Document.Form is NULL or not an object',$this->strErrorMsg));

		$arrDoSPT['FORM_NAME']=$sptFormName;
		$arrDoSPT['FLAG_FORM_AVAILABLE']=$flagFrmAvailable;

		#Init the Flag to Show the Total Records Found
		$tmpFlag_TotRec=trim($arrChildParam['SHOW_TOTAL_RECORDS_FOUND']);
		if($tmpFlag_TotRec!=='') $sptFlag_TotRec=$tmpFlag_TotRec;
		else $sptFlag_TotRec=0;
		if((bool)$sptFlag_TotRec) $arrDoSPT['FLAG_SHOWTOTALREC']='Y';
		else $arrDoSPT['FLAG_SHOWTOTALREC']='N';

		#Init the Move First Link/Image
		$tmpMoveFirst=trim($arrChildParam['IMAGE_MOVE_FIRST']);
		if($tmpMoveFirst=='') $sptMoveFirst='&lt;&lt;First';
		else $sptMoveFirst=$tmpMoveFirst;


		#Init the Move Prev Link/Image
		$tmpMovePrev=trim($arrChildParam['IMAGE_MOVE_PREV']);
		if($tmpMovePrev=='') $sptMovePrev='&lt;Prev';
		else $sptMovePrev=$tmpMovePrev;


		#Init the Move Next Link/Image
		$tmpMoveNext=trim($arrChildParam['IMAGE_MOVE_NEXT']);
		if($tmpMoveNext=='') $sptMoveNext='Next&gt;';
		else $sptMoveNext=$tmpMoveNext;


		#Init the Move Last Link/Image
		$tmpMoveLast = trim($arrChildParam['IMAGE_MOVE_LAST']);
		if($tmpMoveLast=='') $sptMoveLast = 'Last&gt;&gt;';
		else $sptMoveLast = $tmpMoveLast;

		#Init the Additional Values to be passed with the URL (on Submittion)
		$tmpAdditional = trim($arrChildParam['ADDITIONAL_VALUES']);
		if($tmpAdditional=='') $arrDoSPT['ADD_VAL']='';
		else $arrDoSPT['ADD_VAL']=str_replace('?','',$tmpAdditional);



		if($sptFlag_TotRec=='1') $ShowTotal=true;
		else $ShowTotal=false;
		if($flagFrmAvailable=='Y') $frmAvailable=true;
		else $frmAvailable=false;
		$URL_APPEND=stripslashes(trim($arrArguments['ADD_VAL']));
		if(substr($URL_APPEND,0,1)!='&') $URL_APPEND='&'.$URL_APPEND;
		$URL_APPEND=addslashes($URL_APPEND);
		$URL_APPEND=str_replace("\\'", "'", $URL_APPEND); #Eliminating the JS Error Possibility

//          echo "here".$arrParentParam["SPT_URL_PARAM"];


		if ( $arrChildParam["SPT_URL_PARAM"] )
		{
			$base_url = substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&SPTPage")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&SPTPage")); 
			$URL_APPEND .= ereg_replace("SPTPage=[0-9]+&","",$base_url);
		}

		#Prepare the JS Code
		$stmtJS = $this->strJSCode;
		$jsFuncName = 'fn'.strtoupper(uniqid('SPT')); #This is the JS Function Name
		$stmtJS = str_replace('<FRM_NAME>', $sptFormName, $stmtJS); #Replacing values
		$stmtJS = str_replace('<FUNCTION_NAME>', $jsFuncName, $stmtJS);
		$stmtJS = str_replace('<ADD_VALUES>', $URL_APPEND, $stmtJS);
		$stmtSPTCode.=$stmtJS; #Appending the JS Code

          $arrDoSPT['JS_FUNC_NAME'] = $jsFuncName;

		$SPT_TotalPages = ceil($this->TOTAL_RECORDS/$this->RECORDS_PER_PAGE); #Calculate Total Pages
		if($this->TOTAL_RECORDS!=0 AND $SPT_TotalPages > 1)
		{
			if(!$frmAvailable) $stmtSPT.='<FORM id="'.$sptFormName.'" ACTION="" METHOD="POST">'."\n";

			$stmtSPT.="<table width='100%' cellpadding='0' cellspacing='0' border='0'>";
			$stmtSPT.="<tr>";

			if($ShowTotal) 
			{
				$stmtSPT.="<td align='left' style='font-family:Verdana;font-size:11px;color:#000000;'><b>&nbsp;Total ".$this->TOTAL_RECORDS." record(s) found</b></td>";
			}
			else 
			{
				$stmtSPT.='';
			}

			$stmtSPT.="<td align='right' class='jobs'>";
			#== [Create FIRST Page Link]
			if($this->intCurrentPage==1)
			{
				$stmtSPT.=$sptMoveFirst;
			}
			else 
			{
				$stmtSPT.='<a class="llinks" href="#" onclick="javascript:{'.$jsFuncName.'(1);}" title="Move to First Page"><u>'.$sptMoveFirst.'</u></a>';
			}
			$stmtSPT.='&nbsp;';

			#== [Create PREVIOUS Page Link]
			if($this->intCurrentPage==1) $stmtSPT.=$sptMovePrev;
			else $stmtSPT.='<a href="#" class="llinks" onclick="javascript:{'.$jsFuncName.'('.($this->intCurrentPage-1).');}" title="Move to Previous Page"><u>'.$sptMovePrev.'</u></a>';
			$stmtSPT.='&nbsp;';
			
			$stmtSPT.='&nbsp;&nbsp;';

               #Choose the SPT Style
               $intSPTStyle=trim($arrChildParam['PAGINATION_STYLE']);
               switch($intSPTStyle)
               {
                    case '1':
                         $stmtSPT .= $this->fnSPT_Style1($arrDoSPT);
                         break;
                    case '2':
                         $stmtSPT .= $this->fnSPT_Style2($arrDoSPT);
                         break;
                    case '3':
                         $stmtSPT .= $this->fnSPT_Style3($arrDoSPT);
                         break;
                    default:
                         $stmtSPT .= $this->fnSPT_Style1($arrDoSPT);
                          break;
               }

			#== [Create NEXT Page Link]
			if($this->intCurrentPage==$SPT_TotalPages) $stmtSPT.=$sptMoveNext;
			else $stmtSPT.='<a href="#" class="llinks" onclick="javascript:{'.$jsFuncName.'('.($this->intCurrentPage+1).');}" title="Move to Next Page"><u>'.$sptMoveNext.'</u></a>';
			$stmtSPT.='&nbsp;';

			#== [Create LAST Page Link]
			if($this->intCurrentPage==$SPT_TotalPages) $stmtSPT.=$sptMoveLast;
			else $stmtSPT.='<a href="#" class="llinks" onclick="javascript:{'.$jsFuncName.'('.$SPT_TotalPages.');}" title="Move to Last Page"><u>'.$sptMoveLast.'</u></a>';

			for($i=0;$i<=3;$i++) $stmtSPT.='&nbsp;';
			$stmtSPT.="</td></tr>\n</table>";
			if(!$frmAvailable) $stmtSPT.='</FORM>';
			$stmtSPTCode.=$stmtSPT;
		} else $stmtSPTCode='';
# End 
		return $stmtSPTCode;
	}
	
	Function fnSPT_Style1($arrArguments)
	{
		$stmtSPTCode='';
		#Config and Fix the Arguments
          $jsFuncName = $arrArguments['JS_FUNC_NAME'];
		$SPT_TotalPages = ceil($this->TOTAL_RECORDS/$this->RECORDS_PER_PAGE); #Calculate Total Pages
		if($this->TOTAL_RECORDS!=0 AND $SPT_TotalPages > 1)
		{
			#== [Create ALL PAGE Dropdown]
			$stmtSPT.="<select name='SPT_CurrentPage' onChange=\"javascript:$jsFuncName(this.value);\">";
			for($i=1;$i<=$SPT_TotalPages;$i++)
			{
			 $stmtSPT.="<option value='$i' ";
			 if($this->intCurrentPage==$i) $stmtSPT.='selected';
			 $stmtSPT.=">$i</option>";
			}
			$stmtSPT.="</select>";
			$stmtSPT.='&nbsp;';
		} else $stmtSPT='';
		return $stmtSPT;
	}#END FUNCTION fnSPT_Style1()



	Function fnSPT_Style2($arrArguments)
	{
		$stmtSPTCode='';
          return $stmtSPTCode;
	}#END FUNCTION fnSPT_Style2()



	Function fnSPT_Style3($arrArguments)
	{
		$stmtSPTCode='';
		#Config and Fix the Arguments
          $jsFuncName = $arrArguments['JS_FUNC_NAME'];

		$SPT_TotalPages = ceil($this->TOTAL_RECORDS/$this->RECORDS_PER_PAGE); #Calculate Total Pages
		if($this->TOTAL_RECORDS!=0 AND $SPT_TotalPages > 1)
		{
		
			#== Create PAGE Links
			if(($this->intCurrentPage-floor($this->PAGELINKS_PER_PAGE/2))<1) $LowerLimit=1;
			else $LowerLimit=($this->intCurrentPage-floor($this->PAGELINKS_PER_PAGE/2));
			if($SPT_TotalPages>=$this->PAGELINKS_PER_PAGE)
			{
				if(($LowerLimit+($this->PAGELINKS_PER_PAGE-1))>$SPT_TotalPages)
				{
					$LowerLimit-=(($LowerLimit+($this->PAGELINKS_PER_PAGE-1))-$SPT_TotalPages);
					$UpperLimit=$SPT_TotalPages;
				}else $UpperLimit=($LowerLimit+($this->PAGELINKS_PER_PAGE-1));
			}else $UpperLimit=$SPT_TotalPages;
			
			for($i=$LowerLimit;$i<=$UpperLimit;$i++)
			{
				if($this->intCurrentPage==$i) $stmtSPT.=$i;
				else $stmtSPT.='<a href="#" class="llinks" onclick="javascript:{'.$jsFuncName.'('.$i.');}"><u>'.$i.'</u></a>';
				$stmtSPT.='&nbsp;&nbsp;';
			}
		} else $stmtSPT='';

		return $stmtSPT;

	}#END FUNCTION fnSPT_Style3()

}#END CLASS

?>