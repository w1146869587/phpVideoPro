<BR>
<TABLE ALIGN="center" CELLPADDING="0" CELLSPACING="0" BORDER="0" id="appWin"><TR><TD>
<DIV STYLE="display:inline">
<TABLE WIDTH="95%" CELLPADDING="0" CELLSPACING="0" CLASS="window" BORDER=0" ALIGN="center"><TR><TD>
<TABLE WIDTH="100%" CELLPADDING="0" CELLSPACING="0" BORDER="0">
 <TR><TD NOWRAP WIDTH="100%" CLASS="wintitle"><DIV STYLE="margin:2">{listtitle}</DIV></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_home" CLASS="imgbut" SRC="{tpl_dir}images/win_home.gif" WIDTH="14" HEIGHT="13" onClick="window.location.href='{home_link}'"></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_search" CLASS="imgbut" SRC="{tpl_dir}images/win_search.gif" WIDTH="14" HEIGHT="13" onClick="window.location.href='{search_link}'"></TD>
     <TD ALIGN="right" CLASS="wintitle" STYLE="vertical-align:middle;">
      <INPUT TYPE="image" NAME="button_help" CLASS="imgbut" SRC="{tpl_dir}images/win_help.gif" WIDTH="14" HEIGHT="13" onClick="{help_link}"></TD>
     <TD CLASS="wintitle" STYLE="vertical-align:middle;margin-right:3;"><DIV STYLE="width:18;">
      <INPUT TYPE="image" NAME="button_close" CLASS="imgbut" SRC="{tpl_dir}images/win_close.gif" WIDTH="14" HEIGHT="13" onClick="window.location.href='{logoff_link}'"></DIV></TD></TR>
</TABLE></TD></TR>
<TR><TD BGCOLOR="#AAAAAA"><IMG SRC="{tpl_dir}0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD BGCOLOR="#FFFFFF"><IMG SRC="{tpl_dir}0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD>

<DIV STYLE="margin:3;text-align:center">{save_result}</DIV>
<FORM NAME="admin_users" METHOD="post" ACTION="{formtarget}">
<TABLE ALIGN="center" BORDER="0" STYLE="margin:3" CELLPADDING="0" CELLSPACING="0"><TR><TD>
<TABLE ALIGN="center" BORDER="1">
 <TR><TH COLSPAN="3"><DIV ALIGN="center">{head_users}</DIV></TH>
     <TH COLSPAN="4"><DIV ALIGN="center">{head_access}</DIV></TH>
     <TH><DIV ALIGN="center">{head_admin}</DIV></TH>
     <TH COLSPAN="2"><DIV ALIGN="center">{head_actions}</DIV></TH></TR>
 <TR><TH><DIV ALIGN="center">{head_id}</DIV></TH>
     <TH><DIV ALIGN="center">{head_login}</DIV></TH>
     <TH><DIV ALIGN="center">{head_comment}</DIV></TH>
     <TH><DIV ALIGN="center">{head_browse}</DIV></TH>
     <TH><DIV ALIGN="center">{head_add}</DIV></TH>
     <TH><DIV ALIGN="center">{head_upd}</DIV></TH>
     <TH><DIV ALIGN="center">{head_del}</DIV></TH>
     <TH><DIV ALIGN="center">{head_isadmin}</DIV></TH>
     <TH><DIV ALIGN="center">{head_edit}&nbsp;</DIV></TH>
     <TH><DIV ALIGN="center">{head_delete}&nbsp;</DIV></TH></TR>
<!-- BEGIN itemblock -->
 <TR CLASS="content"><TD><DIV ALIGN="right">{user_id}</DIV></TD>
     <TD>{login}</TD>
     <TD>{comment}</TD>
     <TD><DIV ALIGN="center">{browse}</DIV></TD>
     <TD><DIV ALIGN="center">{add}</DIV></TD>
     <TD><DIV ALIGN="center">{upd}</DIV></TD>
     <TD><DIV ALIGN="center">{del}</DIV></TD>
     <TD><DIV ALIGN="center">{isadmin}</DIV></TD>
     <TD><DIV ALIGN="center">{edit}</DIV></TD>
     <TD><DIV ALIGN="center">{delete}</DIV></TD>
     </TR>
<!-- END itemblock -->
</TABLE></TD></TR><TR><TD>

<TR><TD BGCOLOR="#AAAAAA"><IMG SRC="{tpl_dir}0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TR><TD BGCOLOR="#FFFFFF"><IMG SRC="{tpl_dir}0.gif" WIDTH="1" HEIGHT="1" BORDER="0"></TD></TR>
<TABLE WIDTH="100%" BORDER="0" STYLE="margin:3">
 <TR><TD><DIV ALIGN="center">{update}</DIV></TD>
     <TD><DIV ALIGN="center">{adduser}</DIV></TD></TR>
</TABLE></TD></TR>
{hidden}
</TABLE>
</FORM>

</TD></TR></TABLE>
</DIV>
</TD></TR></TABLE>