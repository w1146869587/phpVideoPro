<?php
 #############################################################################
 # phpVideoPro                              (c) 2001-2007 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft AT qumran DOT org>                   #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # Download Medialist/Stafflist/Categorylist in csv/ascii/html format        #
 #############################################################################

 /* $Id$ */

 #=================================================[ Register global vars ]===
 $postit = array ("outputtype","pagelength","order","create");
 foreach ($postit as $var) {
   if (isset($_POST[$var])) $$var = $_POST[$var];
   else $$var = '';
 }
 unset($postit);

 #========================================================[ initial setup ]===
 $page_id = "listgen";
 if ($outputtype) $silent = TRUE;
 include("inc/includes.inc");
 if (!$pagelength) $pagelength = $pvp->preferences->get("page_length");

 #=======================================================[ security check ]===
 if (!$pvp->auth->browse) kickoff();
 if (!empty($_REQUEST["order"])) { // set via SELECT, so we know the values
   $arr = array("num","title","cat","dir","music","actor");
   if (!in_array($_POST["order"],$arr)) vul_kick("order");
   if (!empty($_GET["order"]) && !in_array($_GET["order"],$arr)) vul_kick("order");
 }
 if (!empty($_REQUEST["outputtype"])) { // set via SELECT, so we know the values
   $arr = array("csv","html","ascii");
   if (!in_array($_POST["outputtype"],$arr)) vul_kick("outputtype");
   if (!empty($_GET["outputtype"]) && !in_array($_GET["outputtype"],$arr))
     vul_kick("outputtype");
 }
 if (!$pvp->common->req_is_alnum("pagelength"))
   $pvp->common->die_error(lang("input_errors_occured",1)."<UL>\n<LI>"
     .str_replace("\\n"," ",lang("len_is_nan"))."</LI>\n</UL>");

 #=========================================[ create and send list for d/l ]===
 if ($outputtype) {

   set_time_limit(0); // disable time out - else long lists have no chance

   function listtitle($page,$pages) { // title line for multi-page lists
     GLOBAL $listtitle;
     $add = "-= $page / $pages =-";
     $lt = substr($listtitle,0,strlen($listtitle) - strlen($add)) . $add;
     return $lt;
   }

   #-------------------[ obtain list of movies & prepare default settings ]---
   $pagewidth  = 98;
   switch ($order) {
     case "title" : $listtitle = lang("medialist_alpha"); $pfile="movie"; break;
     case "cat"   : $listtitle = lang("catlist_alpha"); $pfile="cat"; break;
     case "dir"   : $listtitle = lang("directors_list"); $pfile="person"; break;
     case "music" : $listtitle = lang("music_list"); $pfile="person"; break;
     case "actor" : $listtitle = lang("actors_list"); $pfile="person"; break;
     default      : $listtitle = lang("medialist_num"); $pfile="movie"; break;
   }
   $listtitle .= " (" . $pvp->common->formatDate(date('Y'),date('m'),date('d')) . ")";
   switch ($outputtype) {
     case "csv"  : $sep = "\t"; $align = FALSE; $multipage = FALSE; $ext = "csv"; break;
     case "html" : $sep = "</TD><TD>"; $align = FALSE; $multipage = FALSE; $ext = "htm";
                   $linestart="<TR><TD>"; $lineend="</TD></TR>";
		   $blockstart="<TABLE>"; $blockend="</TABLE>"; break;
     default     : $sep = " "; $align = TRUE; $multipage = TRUE; $ext = "txt"; break;
   }
   if ($align) $listtitle = $pvp->common->centerstr($listtitle,$pagewidth);

   include("inc/listgen_$pfile.inc");

   if ($multipage && (--$i % $pagelength)) $out .= "\x0C"; // formfeed after last page if not done

   #-------------------------------------------[ send list to the browser ]---
   header("Content-Disposition: attachment; filename=medialist.$ext");
   header("Content-type: application/octet-stream"); // text/plain will be displayed inline, so we fool the browser
   echo $out;
   exit;
 }

 #========================================[ form to prompt user for input ]===
 include("inc/header.inc");
 $t = new Template($pvp->tpl_dir);
 $t->set_file(array("list"=>"listgen.tpl"));
 $t->set_block("list","definitionblock","definitionlist");
 $list   = "<SELECT NAME=\"order\">"
         . "<OPTION VALUE=\"num\">" . lang("medialist_num"). "</OPTION>"
	 . "<OPTION VALUE=\"title\">" . lang("medialist_alpha") . "</OPTION>"
	 . "<OPTION VALUE=\"cat\">" . lang("catlist_alpha") . "</OPTION>"
	 . "<OPTION VALUE=\"dir\">" . lang("directors_list") . "</OPTION>"
	 . "<OPTION VALUE=\"music\">" . lang("music_list") . "</OPTION>"
	 . "<OPTION VALUE=\"actor\">" . lang("actors_list") . "</OPTION>"
	 . "</SELECT>";
 if (!$pvp->cookie->active) $list .= "<INPUT TYPE='hidden' NAME='sess_id' VALUE='".$_REQUEST["sess_id"]."'>";
 $format = "<SELECT NAME=\"outputtype\"><OPTION VALUE=\"ascii\">ASCII</OPTION>"
	 . "<OPTION VALUE=\"html\">HTML</OPTION>"
         . "<OPTION VALUE=\"csv\">CSV</OPTION></SELECT>";
 $lines  = "<INPUT NAME=\"pagelength\" VALUE=\"$pagelength\" SIZE=\"3\">";
 $t->set_var("liste",$list);
 $t->set_var("format",$format);
 $t->set_var("lines",$lines);
 $t->parse("definitionlist","definitionblock");
 $t->set_var("liste",lang("list"));
 $t->set_var("format",lang("format"));
 $t->set_var("lines",lang("line_count"));
 $t->set_var("listtitle",lang("listgen"));
 $t->set_var("form_target",$_SERVER["PHP_SELF"]);
 $t->set_var("create",lang("create"));
 $t->pparse("out","list");

 include("inc/footer.inc");
?>