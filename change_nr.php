<?php
 ##############################################################################
 # phpVideoPro                              (c) 2001-2010 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft AT qumran DOT org>                   #
 # http://www.izzysoft.de/                                                   #
 # -------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it       #
 # under the terms of the GNU General Public License (see doc/LICENSE)        #
 # -------------------------------------------------------------------------- #
 # Change number and/or type of medium (tape/dvd/vcd)                         #
 ##############################################################################

 /* $Id$ */

 $page_id = "media_change";
 include("inc/includes.inc");

 #=================================================[ Vulnerability checks ]===
 vul_num("old_mtype");
 vul_num("new_mtype");
 vul_alnum("copy");
 vul_alnum("change");
 $vuls = array();
 if (!$pvp->common->req_is_num("old_cass_id") || !$pvp->common->req_is_num("old_part")
   || !$pvp->common->req_is_num("new_cass_id") || !$pvp->common->req_is_num("new_part"))
   $vuls[] = str_replace("\\n"," ",lang("medianr_is_nan"));
 if ($vc=count($vuls)) {
   $msg = lang("input_errors_occured",$vc) . "<UL>\n";
   for ($i=0;$i<$vc;++$i) {
     $msg .= "<LI>".$vuls[$i]."</LI>\n";
   }
   $msg .= "</UL>";
   $pvp->common->die_error($msg);
 }

 #=================================================[ Register global vars ]===
 $details = array ("copy","change","old_mtype","old_cass_id","old_part",
                   "new_mtype","new_cass_id","new_part");
 foreach ($details as $var) {
   if (isset($_POST[$var])) $$var = $_POST[$var];
 }
 $details = array ("mtype_id","cass_id","part","id");
 foreach ($details as $var) {
   if (isset($_REQUEST[$var])) $$var = $_REQUEST[$var];
 }

 #=========================================================[ Helper Funcs ]===
 function make_nr($cass,$part) {
   while ( strlen($cass)<4 ) { $cass = "0".$cass; }
   if ( strlen($part)<2 ) { $part = "0".$part; }
   return $cass . "-" . $part;
 }


 #==================================================[ Check authorization ]===
 if ( (isset($copy) && !$pvp->auth->add) || (isset($change) && !$pvp->auth->update) ) {
   kickoff();
 }

 #==================[ On submit: Do the changes & re-route to edit screen ]===
 if ( isset($copy) || isset($change) ) {
   $error = "";
   if ( !$valid->medianr($new_mtype,$new_cass_id,$new_part) ) {
     $error = lang("invalid_media_nr") . "</P>\n";
   } else {
     $minfo = $db->get_mediainfo($new_mtype,$new_cass_id);
     if (! ($pvp->auth->admin || empty($minfo->owner) || $minfo->owner_id==$pvp->auth->user_id
       || $db->get_usergrants(array($minfo->owner_id),array(0,$pvp->auth->user_id),array("INSERT")) )) {
       $error = lang("update_failed_permission"); }
   }
   if (!empty($error)) {
     header('Content-type: text/html; charset=utf-8');
     echo "<HTML><HEAD>\n <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>\n"
        . " <meta http-equiv='cache-control' content='no-cache'>\n <TITLE>Error</TITLE>\n"
        . " <link href='".$pvp->tpl_url."/default.css' rel='stylesheet' type='text/css'>\n"
        . "</HEAD><BODY>\n";
     display_error($error);
     echo "</BODY></HTML>";
     exit;
   }
   $movie_id = $db->get_movieid($old_mtype,$old_cass_id,$old_part);
   $movie = $db->get_movie($movie_id);
 } else {
   include("inc/header.inc");
 }
 if ( isset($change) ) {
   $db->move_movie($movie_id,$new_mtype,$new_cass_id,$new_part);
   $new_nr = make_nr($new_cass_id,$new_part);
   header("location: " .$pvp->link->slink("edit.php?mtype_id=$new_mtype&cass_id=$new_cass_id&part=$new_part&nr=$new_nr"));
 } elseif ( isset($copy) ) {
   $movie['space']    = $db->get_mediaspace($movie['cass_id'],$movie['mtype_id']);
   $movie['mtype_id'] = $new_mtype;
   $movie['cass_id']  = $new_cass_id;
   $movie['part']     = $new_part;
   if ( !$movie['lp'] ) $movie['lp'] = 0;
   $db->add_movie($movie);
   $new_nr = make_nr($new_cass_id,$new_part);
   header("location: " .$pvp->link->slink("edit.php?mtype_id=$new_mtype&cass_id=$new_cass_id&part=$new_part&nr=$new_nr"));
   exit;
 }

 #============================[ Otherwise: Create the form for user input ]===
 #---------------------------------------------[ Setup special JavaScript ]---
 $nr_nan = lang("medianr_is_nan");
 $js = "<SCRIPT TYPE='text/javascript' LANGUAGE='JavaScript'>//<!--
   function check_nr(nr,ori) {
     if (isNaN(nr.value)) {
       nr.value = ori;
       alert('$nr_nan');
     }
   }
//--></SCRIPT>";
 #--------------------------------------------------------[ Generate form ]---
 $movie = $db->get_movie($id);

 $t = new Template($pvp->tpl_dir);
 $t->set_file(array("template"=>"change_nr.tpl"));
 $t->set_var("js",$js);
 $t->set_var("listtitle",lang("change_nr",$movie['mtype_short']. " " .$movie['cass_id']. "-" .$movie['part']));
 $t->set_var("form_target",$_SERVER["PHP_SELF"]);
 $t->set_var("latest",lang("highest_db_entries"));
 $t->set_var("latest_box",$pvp->common->make_lastnum_selectbox("lastnum"));
 $t->set_var("orig",lang("orig_medianr"));
 $t->set_var("o_mtype",$pvp->common->make_mtype_selectbox("old_mtype",$movie['mtype_id']));
 $t->set_var("o_medianr","<INPUT NAME='old_cass_id' ".$form["addon_cass_id"]."  VALUE='".$movie['cass_id']."' onChange='check_nr(this,".$movie['cass_id'].");'>");
 $t->set_var("o_part","<INPUT NAME='old_part' ".$form["addon_part"]." VALUE='".$movie['part']."' onChange='check_nr(this,".$movie['part'].");'>");
 $t->set_var("new",lang("new_medianr"));
 $t->set_var("n_mtype",$pvp->common->make_mtype_selectbox("new_mtype",$movie['mtype_id']));
 $t->set_var("n_medianr","<INPUT NAME='new_cass_id' ".$form["addon_cass_id"]."  VALUE='".$movie['cass_id']."' onChange='check_nr(this,".$movie['cass_id'].");'>");
 $t->set_var("n_part","<INPUT NAME='new_part' ".$form["addon_part"]." VALUE='".$movie['part']."' onChange='check_nr(this,".$movie['part'].");'>");
 $t->set_var("copy","<INPUT CLASS='submit' TYPE='submit' NAME='copy' VALUE='".lang("media_copy")."'>");
 $change = "<INPUT CLASS='submit' TYPE='submit' NAME='change' VALUE='".lang("media_change")."'>";
 if (!$pvp->cookie->active) $change .= "<INPUT TYPE='hidden' NAME='sess_id' VALUE='".$_REQUEST["sess_id"]."'>";
 $t->set_var("change",$change);

 $t->pparse("out","template");

 include("inc/footer.inc");

?>