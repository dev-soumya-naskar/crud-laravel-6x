<?php
if(!defined('__CONFIG__'))
{
	header("location:../index.php");
	die();
}
$ass_id	= loadVariable('id','');

if(empty($ass_id)){
    header("location: index.php?p=ra_gap_evaluation");
    exit(); 
}

$Query = "SELECT * FROM kar_custom_assessments WHERE md5(id)='".$ass_id."' ";
$objDB->setQuery($Query);
$rs    = $objDB->select();
if(count($rs)==0){
    header("location: index.php?p=ra_gap_evaluation");
    exit(); 
}else{
    $assment_id = $rs[0]['id'];
    $assment_slug = $rs[0]['slug'];
    $assment_name = $rs[0]['assessment'];
    
}
#die("SELECT * FROM ".$prefix."risk_questions_sections WHERE appear_in = ".$assment_slug." order by position asc");
$prefix = 'hipaa_';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
.wrape {
	width:100%;
	border:solid 1px #cccccc;
	border-radius:8px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	position:relative;
	margin-top:25px;
}
.table-padding {
	border-bottom: solid 1px #cccccc;
}
.gray-box {
	background-color:#f2f4f5;
	padding:25px;
	width:180px;
}
.gray-boder {
	border-bottom: solid 1px #cccccc;
	padding-left:15px;
	vertical-align: middle;
}
#apDiv1 {
	position:absolute;
	left:19px;
	top:-13px;
	width:61px;
	height:24px;
	z-index:1;
	background: #f7f7fc; /* Old browsers */
	background: -moz-linear-gradient(top, #f7f7fc 0%, #d6dadf 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f7f7fc), color-stop(100%, #d6dadf)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #f7f7fc 0%, #d6dadf 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #f7f7fc 0%, #d6dadf 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #f7f7fc 0%, #d6dadf 100%); /* IE10+ */
	background: linear-gradient(to bottom, #f7f7fc 0%, #d6dadf 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7fc', endColorstr='#d6dadf', GradientType=0 ); /* IE6-9 */
	border-radius:5px;
	padding:5px 10px;
	border:solid 1px #cccccc;
	height:15px;
	line-height:15px;
}
.wrape ul {
	margin:0px;
	list-style:none;
	padding:0px;
}
.wrape ul li {
	width:100%;
	float:none;
}
.wrape .clear {
	clear:both;
}
.table_new td{ padding:10px!important;}
.table_new input[type="checkbox"]{ margin-right:10px;}
.left_top_s {
    color: #375270;
    float: left;
    font-size: 17px;
    line-height: 20px;
    padding: 21px 0;
    text-align: left;
    width: 58%;
}
.middle_top_s {
    float: left;
    font-size: 16px;
    padding: 21px 0;
    width: 22%;
}
.middle_top_s p {
    font-size: 17px;
    font-weight: bold;
    padding: 25px 0;
}
.right_top_s {
    color: #3e42ed;
    float: right;
    font-size: 15px;
    text-align: center;
    width: 20%;
}
.big-txt-level-first {
    color: #dc610f;
    float: left;
    font-size: 27px;
    padding: 60px 20px;
    text-align: center;
    width: 37%;
}
.big-txt-level-second {
    float: left;
    padding: 40px 0;
    text-align: center;
    width: 15%;
}
.big-txt-level-third {
    float: left;
    padding: 15px;
    width: 37%;
}
.big-txt-level-second img{float:none !important;}
/***** added by sangeeta *****/
.bar-graph-box{float:left; position:relative;}
.pie-graph-box{float:left;}
.per_pointer::before{border-right:none;}
.pie-graph-box > div {
    text-align: center;
}
.bar-graph-box > table {
    margin-bottom: 52px;
}
.pie-graph-box {
    float: left;
}
.bar-graph-box {
    float: left;
    position: relative;
}
.graph-box {
    margin: 0 auto;
	padding-bottom: 40px;
}
.listpart {
    margin: 12px;
    padding: 25px 0;
}
.listpart h3 {
    font-size: 26px;
    padding: 0 0 20px;
}
.listpart ul {
    list-style-type: disc;
    margin: 0;
    padding: 10px 0 0;
}
.listpart ul li {
    list-style-type: disc;
    margin: 0 0 0 25px;
    padding: 0 0 12px 8px;
}
.clear {
    clear: both;
}
.uploadingscs { width: 180px; }
.uploadingscs img { width: 36px; }
.uploadingscs span { display: inline-block; line-height: 37px; vertical-align: middle; }
.uploadedFiles { margin-top: 10px; }

@media only screen 
and (min-width : 320px) 
and (max-width : 479px){
.big_txt_s span {font-size: 22px;}
.right_top_s span {line-height: 18px;}
.left_top_s {margin-top: 5px;}
}
@media only screen 
and (min-width : 320px) 
and (max-width : 767px){
.left_top_s {
    font-size: 18px;
    padding: 8px 0;
    width: 100%;
}
.middle_top_s{width:100%; text-align:center; padding:8px 0;}
.right_top_s{width:100%; padding:8px 0; text-align:center;}
.big-txt-level-first{font-size:24px; line-height:32px; padding:10px 0; width:100%;}
.big-txt-level-second{width:100%; padding:5px 0;}
.big-txt-level-third{padding:5px 0; text-align:center; width:100%;}
.graph-box{width:100%;}
.bar-graph-box{float:none; margin:0 auto;}
}
@media only screen 
and (min-width : 768px) 
and (max-width : 1023px){
.big-txt-level-third{width:32%;}
.big-txt-level-first{line-height:35px;}
.left_top_s{ font-size:24px; line-height:30px;}
}

 @media screen and (max-width:480px) {
 .wrape ul li {
width:100%;
float:none;
}
 .gray-box {
background-color:#f2f4f5;
padding:25px;
width:115px;
}
}
 @media screen and (max-width:1024px) {
 .wrape ul li {
width:100%;
float:none;
}
 .gray-box {
background-color:#f2f4f5;
padding:25px;
width:115px;
}
}
.success_msg{
 color: #008000;
    font-weight: bold;
    text-align: center;
    width: 100%;
}
.headclass {
	background-color: #258CAD;
    font-size: 18px;
    height: 46px;
    padding-left: 29px;
    padding-top: 21px;
	color:#FFFFFF;
}
a.fileBox {
	margin: 5px 10px 0 0;
	border: 1px solid gray;
   padding: 6px;
   border-radius: 10px;
	display: inline-block;
	z-index: 100;
}
#close{
   background: darkgray;
	color: white;
	border-radius: 50%;
	padding: 1px 5px;
	margin-left: 20px;
	z-index: 999 !important;
}
</style> 
<section role="main" id="main">
<noscript class="message black-gradient simpler">
Your browser does not support JavaScript! Some features won't work as expected...
</noscript>
<hgroup id="main-title" class="thin">
  <h1>Evaluation : <?php echo $assment_name; ?></h1>
  </hgroup>
  
  <?php if(isset($_SESSION[SUCCESS_MSG]) && $_SESSION[SUCCESS_MSG] <> "") { ?>
  <div class="success_msg"><?php echo $_SESSION[SUCCESS_MSG];unset($_SESSION[SUCCESS_MSG]);?></div>
  <?php }    
  if(isset($_SESSION[ERROR_MSG]) && $_SESSION[ERROR_MSG] <> "") {
  ?>
  <div class="error_msg"><?php echo $_SESSION[ERROR_MSG];unset($_SESSION[ERROR_MSG]);?></div>
  <?php }?>
  <div class="with-padding">
    <div class="columns">
      <div class="twelve-columns-tablet">
        <!--six-columns -->
        <!--<h3 class="thin underline"></h3>
-->
        
          <div class="wrape">
            
            <?php  			
			        
			
			       $mysec = get_results( "SELECT * FROM ".$prefix."risk_questions_sections WHERE appear_in = '".$assment_slug."' order by position asc" );
                   
				   if(!empty($mysec)){
				   
					 foreach($mysec as $sec)
                         {
						 
						
								
				$myques = get_results( "SELECT * FROM ".$prefix."risk_questions where section= ".$sec->id."  and appear_in='".$assment_slug."' and is_sub_question='0' order by position asc"  );
					if(!empty($myques ))
					{
                        #echo '<pre>'; print_r($myques);
					?>
					<div class="headclass"><?php echo $sec->section_name ;?>
              <div class="clear"></div>
            </div>
            <ul>
              <li>
                <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="table_new">
					<?php
					
					
					 foreach($myques as $ques)
                         {
					?>
					<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="table_new questionBlock">
                  <?php
				  
				   if($ques->type=='checkbox')
					{
					
					?>
                  <tr>
                    
                    <td  class="gray-boder gray-box question-class" colspan="2"><strong><?php echo $ques->question; ?></strong></td>
                  </tr>
                  <?php
				  
						$myans = get_results( "SELECT * FROM ".$prefix."risk_questions_answer_options where question_id=".$ques->id." ORDER BY position, id desc" );
						
						
						
						$levelChkArr = array('High','Medium','Critical');
						foreach($myans as $ans_op) {
						?>
							<tr>
							  <td  class="gray-boder" colspan="2">
								<input type="checkbox" data-explanation="<?php echo $ans_op->required_explanation; ?>" data-level="<?php echo $ans_op->level; ?>"  name="answer_<?php echo $ques->id; ?>[]" value=""  class=" input chk" />
								 <?php echo $ans_op->option ; ?></td>
							</tr>
							<?php /*
							if(show_ans($ques->id,$ans_op->id) == 'checked') {
								if(in_array($ans_op->level,$levelChkArr)) {
									$showChkCalendar = 'display: \'\';';
								} else {
									$showChkCalendar = 'display: none;';
								}
								if($ans_op->required_explanation == 1) {
									$showChkNotes = 'display: \'\';';
								} else {
									$showChkNotes = 'display: none;';
								}
							} else {
								$showChkCalendar = 'display: none;';
								$showChkNotes = 'display: none;';
							}
							?>
							<!-- optional calendar field for high, critival and medium answered question -->
							<tr style="<?php echo $showChkCalendar; ?>" id="showChkCalender<?php echo $ans_op->id; ?>">
							<td  class="gray-boder gray-box">When you will have this mitigated? &nbsp;&nbsp;&nbsp;<span class="input"> <span class="icon-calendar"></span>
							<input type="text" name="additional_date_info_<?php echo $ans_op->id; ?>" id="additional_date_info_<?php echo $ans_op->id; ?>" value="<?php echo show_ans($ques->id,'additional_date_info',$ans_op->id); ?>"  class="input-unstyled datepicker" readonly="true">
							</span> </td>
							</tr>
                            
							<!-- optional calendar field ends here -->
							
							<!-- Optional notes field if the answer required explanation -->
							<tr style="<?php echo $showChkNotes; ?>" id="showChkNotes<?php echo $ans_op->id; ?>">
							<td colspan="2" class="gray-boder"><textarea name="explanation_<?php echo $ans_op->id; ?>" style="width: 100%; height: 100px;" placeholder="Enter your notes here ..."><?php echo show_ans($ques->id,'explanation',$ans_op->id); ?></textarea></td>
							</tr><?php */ ?>
							<!-- Notes fields ends here -->
                  <?php
						}
					} elseif($ques->type=='textfield') { ?>
                  <tr>
                    
                    <td  class="gray-boder gray-box question-class"><strong><?php echo $ques->question; ?></strong></td>
                    <td  class="gray-boder">
							<?php if($ques->is_smaller_textbox == 0) { ?>
								<textarea style="width: 100%; height: 100px;" name="answer_<?php echo $ques->id; ?>" class="txtarea" rows="5"></textarea>
							<?php } else { ?>
								<input type="text" style="width: 70%;" name="answer_<?php echo $ques->id; ?>" class="input" value="">
							<?php } ?>
							</td>
                  </tr>
                  <?php } elseif($ques->type=='textfieldoptional') { ?>
                  <tr>
                    <input type="hidden" name="question[]" value="<?php echo $ques->id; ?>">
                    <td  class="gray-boder gray-box"><strong><?php echo stripslashes($ques->question); ?></strong></td>
                    <td  class="gray-boder"><textarea cols="100" class="validate[required]" name="answer_<?php echo $ques->id; ?>" rows="5">
</textarea></td>
                  </tr>
                  <?php } elseif($ques->type=='no_risk_level') { ?>
							<tr>
                   
                    <td  class="gray-boder gray-box question-class"><strong><?php echo $ques->question; ?></strong></td>
                    <td  class="gray-boder">
							<?php if($ques->is_smaller_textbox == 0) { ?>
								<textarea style="width: 100%; height: 100px;" name="no_risk_<?php echo $ques->id; ?>[]" class="txtarea" rows="5"></textarea>
							<?php } else { ?>
								<input type="text" style="width: 70%;" name="no_risk_<?php echo $ques->id; ?>[]" class="input" value="">
							<?php } ?>
                    </td>
                  </tr>
						<?php } elseif($ques->type=='date') { ?>
                  <tr>
                    
                    <td  class="gray-boder gray-box question-class"><strong><?php echo $ques->question; ?></strong></td>
                    <td  class="gray-boder"><span class="input"> <span class="icon-calendar"></span>
                      <input type="text" autocomplete="off" name="answer_<?php echo $ques->id; ?>" value=""  class="input-unstyled datepicker dt" readonly="true">
                      </span> </td>
                  </tr>
                  <?php } elseif($ques->type=='radio') { ?>
                  <tr>
                    
                    <td  class="gray-boder gray-box question-class" colspan="2"><strong><?php echo $ques->question; ?></strong></td>
                  </tr>
                  <?php
				  
						$myans = get_results( "SELECT * FROM ".$prefix."risk_questions_answer_options where question_id=".$ques->id." ORDER BY position,id desc");
						$myans_max_point = get_results( "SELECT max(point) as max_point FROM ".$prefix."risk_questions_answer_options where question_id=".$ques->id );
					 
						
						
						$levelArr = array('High','Medium','Critical');
						$selected_answer = '';
						foreach($myans as $ans_op)
						{
				  
				  ?>
                  <tr>
                    <td  class="gray-boder" colspan="2"><input type="radio" name="answer_<?php echo $ques->id; ?>[]" class="rdo" data-explanation="<?php echo $ans_op->required_explanation; ?>" data-level="<?php echo $ans_op->level; ?>"  value="<?php echo $ans_op->id ; ?>|<?php echo $ans_op->point ; ?>" />
						  <?php echo $ans_op->option ; ?>
						  <?php /* if((show_ans($ques->id,$ans_op->id) == 'checked')&&(in_array($ans_op->level,$levelArr))) {
								if($ques->disabled_calendar == 1) {
									$showCalendar = 'display: none;';
								} else {
									$showCalendar = 'display: \'\';';
								}
						  } else {
								$showCalendar = 'display: none;';
						  }
						  if($ans_op->required_explanation == 1) {
								$showNotes = 'display: \'\';';
						  } else {
								$showNotes = 'display: none;';
						  }
						  
						  */
						  ?>
						  </td>
                  
						
							</tr>
                            <?php /* ?>
								<!-- optional calendar field for high, critical and medium answered question -->
								<tr style="<?php echo $showCalendar; ?>" id="showCalender<?php echo $ans_op->id; ?>">
								<td  class="gray-boder gray-box">When you will have this mitigated? &nbsp;&nbsp;&nbsp;<span class="input"> <span class="icon-calendar"></span>
								<input type="text" name="additional_date_info_<?php echo $ans_op->id; ?>" id="additional_date_info_<?php echo $ans_op->id; ?>" value="<?php echo show_ans($ques->id,'additional_date_info'); ?>"  class="input-unstyled datepicker" readonly="true">
								</span> </td>
								</tr>
                                
								<!-- optional calendar field ends here -->
								
								<!-- Optional notes field if the answer required explanation -->
								<tr style="<?php echo $showNotes; ?>" id="showNotes<?php echo $ans_op->id; ?>">
								<td colspan="2" class="gray-boder"><textarea name="explanation_<?php echo $ans_op->id; ?>" style="width: 100%; height: 100px;" placeholder="Enter your notes here ..."><?php echo show_ans($ques->id,'explanation'); ?></textarea></td>
							</tr><?php */ ?>
							<!-- Notes fields ends here -->
						<?php } ?>
						
                  <input type="radio" name="answer_<?php echo $ques->id; ?>[]" value=""  class="" style="display:none;"  />
						<tr><td colspan="2">
						<div class="subQuestions<?php echo $ques->id; ?>">
							<!-- Sub questions will be displayed here.... -->
							<?php //echo fetchSubquestions($selected_answer); ?>
						</div>
						</td></tr>
                  <?php  } ?>
						
						<?php
						
							if($ques->optional_text_box == '1') { ?>
								<tr><td colspan="2"><textarea name="additional_info_<?php echo $ques->id; ?>" style="width: 100%; height: 100px;" placeholder="Add your comments here..."></textarea></td></tr>
							<?php } else { ?>
								<input type="hidden" name="additional_info_<?php echo $ques->id; ?>" value="" />
							<?php }
								if($ques->can_upload_files == '1') { ?>
                                                                
								<tr><td>
								<div class="filetypelabel">
								<p>If you have any documentation you believe is important to consider for this question, please upload it here and provide a title or label to include within the report (e.g., Photo of facilities security locks)</p>
									<div class="rightlnl">
									<div class="custom-file-upload">
										<input type="file" name="uploadedDoc" id="uploadedDoc<?php echo $ques->id; ?>"  />
<span class="uploadingscs" id="uploadingscs<?php echo $ques->id; ?>" style="display:none;"> <img src="images/loader.gif" alt=""> <span>Uploading</span> </span>
										<div class="uploadedFiles" id="uploadedFiles<?php echo $ques->id; ?>">
											<!-- Uploaded files will be displayed here -->
											<?php
											/*$uploadedFiles = getUploadFiles($ques->id);
											if(!empty($uploadedFiles)) {
												foreach($uploadedFiles as $file) {
													if($file['original_name']!='') {
														echo '<a class="fileBox" target="_blank" href="download.php?id='.md5($file['id']).'">'.$file['original_name'].'<span id="close" data-id="'.md5($file['id']).'">&times;</span></a>';
													}
												}
											}*/
											?>
										</div>
									</div>
									
									<div class="clear"></div>
									</div>
								 </div>
								<div class="clear"></div>
								</div>
								</td></tr>
							<?php }  ?>
						
						</table>
					<?php } // end of question loop ?>
				  
				  </table>
              </li>
            </ul>
            <div class="clear"></div>
				  <?php
				  }
				 } 
			}?>
            
            <div>
              <ul>
                <li style="width:100%;">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0"  class="table_new" >
                    <tr>
                      <td  class="gray-boder" align="center" style="padding:15px;">
                          <a href="index.php?p=ra_gap_evaluation"  class="button ">Back</a>
                        <!--<button type="submit" class="button send_result"> <span class="button-icon"><span class="icon-tick"></span></span>back</button></td>-->
                    </tr>
                  </table>
                </li>
              </ul>
            </div>
          </div>
        
      </div>
    </div>
  </div>
  </section>