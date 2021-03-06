<?php
 #############################################################################
 # phpVideoPro                              (c) 2001-2010 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft AT qumran DOT org>                   #
 # http://www.izzysoft.de/                                                   #
 # ------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it      #
 # under the terms of the GNU General Public License (see doc/LICENSE)       #
 # ------------------------------------------------------------------------- #
 # User Login Page                                                           #
 #############################################################################

 /* $Id$ */

 $page_id = "login";
 include("inc/includes.inc");
 vul_alnum("sess_id");
 vul_num("logout");
 vul_alnum("login_hint");
 $details = array("logout","login","passwd","login_hint");
 foreach ($details as $var) {
   if (isset($_REQUEST[$var])) $$var = $_REQUEST[$var];
   else $$var = '';
 }
 if (preg_match("/\s/","${login}${passwd}")) {
   $msg = lang("input_errors_occured",1) . "<UL>\n"
        . "<LI>".lang("loginpwd_whitespace")."</LI>\n</UL>";
   $pvp->common->die_error($msg);
 }
 $url = $pvp->common->safeinput($_REQUEST["url"]);
 if (empty($url)) $redir = urldecode($_REQUEST["redir"]);
 if ($sess_id &!$pvp->session->verify($sess_id)) $login_hint = "session_expired";
 if (isset($redir)) {
   $url = $redir;
 }
 if (!strlen($url))  $url = $base_url . "index.php";
 if (isset($login_hint)) $login_hint = lang("$login_hint");
 if ($sess_id && $logout) {
   $pvp->session->end($sess_id);
   if ($pvp->cookie->active) $pvp->cookie->delete("sess_id");
   $sess_id = "";
 }
 $t = new Template($pvp->tpl_dir);

 if (isset($_POST["submit"])) {
   if ($sess_id = $pvp->session->create($login,$passwd) ) {
     $url = $pvp->link->slink($url);
     if ($pvp->cookie->active) {
       $pvp->cookie->set("sess_id",$sess_id);
     }
     header("Location: $url");
     exit;
   } else {
     $login_hint = "<SPAN CLASS='error'>" .lang("login_failed"). "</SPAN><BR>\n";
   }
 }

 $t->set_file(array("template"=>"login.tpl"));
 $t->set_var("formtarget",$_SERVER["PHP_SELF"]);
 if ( isset($login_hint)) $t->set_var("login_hint",$login_hint);
 $t->set_var("welcome",lang("welcome"));
 $t->set_var("head_login",lang("login")."<INPUT TYPE='hidden' NAME='url' VALUE='$url'>");
 $t->set_var("head_passwd",lang("password"));
 $t->set_var("submit",lang("submit"));

 $menue = 0;
 include("inc/header.inc");
 $t->pparse("out","template");

 include("inc/footer.inc");
?>