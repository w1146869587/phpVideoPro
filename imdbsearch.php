<?
 ##############################################################################
 # phpVideoPro                               (c) 2001-2004 by Itzchak Rehberg #
 # written by Itzchak Rehberg <izzysoft@qumran.org>                           #
 # http://www.qumran.org/homes/izzy/                                          #
 # -------------------------------------------------------------------------- #
 # This program is free software; you can redistribute and/or modify it       #
 # under the terms of the GNU General Public License (see doc/LICENSE)        #
 # -------------------------------------------------------------------------- #
 # Search IMDB for movie information                                          #
 ##############################################################################

 /* $Id$ */

 $page_id = "imdbsearch";
 include("inc/includes.inc");
 include("inc/header.inc");
 require_once ("inc/class.imdb.inc");
 $usecache = TRUE;
 $autoclose = 1;

 #========================================================[ Template setup ]===
 $t = new Template($pvp->tpl_dir);
 $t->set_file(array("template"=>"imdbsearch.tpl"));
 $t->set_block("template","resultblock","resultlist");
 $t->set_block("resultblock","resitemblock","resultitem");

 $t->set_block("template","movieblock","movie");
 $t->set_block("movieblock","pgblock","pglist");
 $t->set_block("movieblock","acatblock","acatlist");
 $t->set_block("acatblock","catblock","catlist");
 $t->set_block("movieblock","dirblock","dirlist");
 $t->set_block("movieblock","actblock","actlist");

 $t->set_block("template","queryblock","query");

 $t->set_var("listtitle",lang("imdb_title_search"));

 if (isset($_REQUEST["name"])) {
 #=================================================[ Get IMDB ID for movie ]===
  $search = new imdbsearch ();
  $search->usecache   = $usecache;
  $search->storecache = $usecache;
  $search->setsearchname ($HTTP_GET_VARS["name"]);
  $results = $search->results ();
  $open = FALSE;
  foreach ($results as $res) {
    $moviename = "<a href='".$_SERVER["PHP_SELF"]."?mid=".$res->imdbid()."'>"
           . $res->title()." (".$res->year().")"."</a>";
    $t->set_var("moviename",$moviename);
    $link  = "<a href='http://".$search->imdbsite."/title/tt".$res->imdbid()
           . "' target='_blank'><img src='".$base_url."images/imdb_movie.gif' "
           . "border='0' alt='Open IMDB page'></a>";
    $t->set_var("links",$link);
    $t->parse("resultitem","resitemblock",$open);
    $open = TRUE;
  }
  $t->parse("resultlist","resultblock");
  $t->pparse("out","template");
 } elseif (isset($_REQUEST["mid"])) {
 #==============================================[ Get movie data from IMDB ]===
   $movieid = $_REQUEST["mid"];
   $movie = new imdb ($movieid);
   $movie->imdbsite="us.imdb.com"; // IMDB parse is fixed to English
   $movie->usecache   = $usecache;
   $movie->storecache = $usecache;
   $movie->setid ($movieid);
   $t->set_var("formtarget",$_SERVER["PHP_SELF"]);
   $t->set_var("mtitle",$movie->title());
   $t->set_var("nyear",lang("year"));
   $t->set_var("myear",$movie->year());
   #-=[ Foto ]=-
   if (($photo_url = $movie->photo_localurl() ) == FALSE) {
     $photo_url = "";
   } else {
     $photo_url = substr($photo_url,strlen($base_url));
#     $t->set_var("mfoto",$photo_url);
     $t->set_var("mfoto_pic","<IMG SRC='$photo_url' ALT='cover' ALIGN='left'>");
   }
   #-=[ Also Known As ]=-
#   $aka = "";
#   foreach ( $movie->alsoknow() as $ak) {
#     $aka .= $ak["title"].": ".$ak["year"].", ".$ak["country"]." (".$ak["comment"].")<BR>";
#   }
#   $t->set_var("maka",$aka);
   #-=[ Length ]=-
   $t->set_var("nruntime",lang("length"));
   $t->set_var("mruntime",$movie->runtime());
   #-=[ Ratings and Votings ]=-
#   $t->set_var("mrating",$movie->rating());
#   $t->set_var("mvotes",$movie->votes());
#   $t->set_var("mlanguage",$movie->language());
   #-=[ Country ]=-
   $acountry = $movie->country(); $cc = count($acountry); $country = "";
   for ($i=0;$i+1<$cc;++$i) {
     $country .= $acountry[$i].", ";
   }
   $country .= $acountry[$i];
   $t->set_var("ncountry",lang("country"));
   $t->set_var("mcountry",$country);
   #-=[ FSK / PG ]=-
   $t->set_var("npg",lang("fsk"));
   $pga = $movie->mpaa(); $open = FALSE;
   foreach ($pga as $var=>$val) {
     $t->set_var("pgval",$val);
     $t->set_var("mpg","$val ($var)");
     $t->parse("pglist","pgblock",$open);
     $open = TRUE;
   }
   #-=[ Categories ]=-
   $t->set_var("ngenre",lang("categories"));
   $gen = $movie->genres(); // split up array and fit into template
   $cc = count($gen); $genre = "";
   for ($i=0;$i+1<$cc;++$i) {
     $genre .= $gen[$i].", ";
     if ($cat_id=$db->get_category_id("cat_".strtolower($gen[$i]))) $cats[]=$cat_id;
   }
   $genre .= $gen[$i];
   if ($cat_id=$db->get_category_id("cat_".strtolower($gen[$i]))) $cats[]=$cat_id;
   $t->set_var("mgenre",$genre);
   $catlist = $db->get_category(); $cc = count($catlist); $open=FALSE; $done=-1;
   for ($k=0;$k<3;++$k) {
    $t->set_var("catnr",$k+1);
    $t->set_var("cid","");
    $t->set_var("csel","");
    $t->set_var("cname","- ".lang("none")." -");
    $t->parse("catlist","catblock");
    for ($i=0;$i<$cc;++$i) {
      $t->set_var("cid",$catlist[$i]["id"]);
      if (in_array($catlist[$i]["id"],$cats) && $done!=$k) {
        $t->set_var("csel"," SELECTED");
        foreach ($cats as $var=>$val) {
          if ($val==$catlist[$i]["id"]) unset ($cats[$var]);
        }
        $done = $k;
      } else {
        $t->set_var("csel","");
      }
      $t->set_var("cname",$catlist[$i]["name"]);
      $t->parse("catlist","catblock",TRUE);
    }
    $t->parse("acatlist","acatblock",$open);
    $open = TRUE;
   }
   #-=[ Misc stuff - maybe for the future ]=-
#   $col = $movie->colors(); // what to do with them?
#   $snd = $movie->sound();  // does not match our formats
#   $t->set_var("mtagline",$movie->tagline());
#   $tag = $movie->taglines(); // array again - do we need this?
#   $wrt = $movie->writing(); // writing credits - array 0..n like director
#   $prod = $movie->producer(); // same as $wrt
   #-=[ Directors ]=-
   $t->set_var("ndir_name",lang("director"));
   $dir = $movie->director(); // array again - need to select
   $cc = count($dir); $open = FALSE;
   for ($i=0;$i<$cc;++$i) {
    $t->set_var("dir_name",$dir[$i]["name"]); // we also have "imdb" and "role"
    if ($i==0) $t->set_var("dsel"," SELECTED"); else $t->set_var("dsel","");
    $t->parse("dirlist","dirblock",$open);
    $open = TRUE;
   }
   $t->set_var("dir_name","");
   $t->set_var("dsel","");
   $t->parse("dirlist","dirblock",$open);
   #-=[ Actors ]=-
   $cast = $movie->cast(); // here come the actors
   $cc = count($cast);
   $open = FALSE;
   $t->set_var("actors",lang("actors"));
   for ($i=0;$i<$cc;++$i) {
     $t->set_var("aname",$cast[$i]["name"]); // we also have "imdb"
     if ($i<5) $t->set_var("asel"," SELECTED"); else $t->set_var("asel","");
     $t->parse("actlist","actblock",$open);
     $open = TRUE;
   }
   #-=[ Plot = Comments ]=-
   $plot = $movie->plot(); $cc = count($plot);
   if (!empty($photo_url)) $comment = "[img]".$photo_url."[/img]";
     else $comment = "";
   for ($i=0;$i<$cc;++$i) { $comment .= $plot[$i]."<BR>\n"; }
   $t->set_var("mcomment",$comment);
   $t->set_var("btransfer",lang("imdb_transfer2edit"));
   $js = "<SCRIPT TYPE='text/javascript' LANGUAGE='JavaScript'>//<!--
  function name_split(name) {
    pos = name.lastIndexOf(' ');
    if (pos==-1) return name;
    return name.substr(pos+1,500);
  }
  function fname_split(name) {
    pos = name.lastIndexOf(' ');
    if (pos==-1) return '';
    return name.substring(0,pos);
  }
  function transfer_data() {
   omf = opener.document.movieform;
   dmf = document.movieform;
   omf.title.value   = dmf.title.value;
   omf.length.value  = dmf.runtime.value;
   omf.country.value = dmf.country.value;
   omf.year.value    = dmf.year.value;
   omf.comment.value = dmf.comment.value;
   omf.cat1_id.value = dmf.cat1_id.value;
   omf.cat2_id.value = dmf.cat2_id.value;
   omf.cat3_id.value = dmf.cat3_id.value;
   name = dmf.directors.value;
   omf.director_name.value  = name_split(dmf.directors.value);
   omf.director_fname.value = fname_split(dmf.directors.value);
   if (dmf.directors.value != '') omf.director_list.click();
   k = 1;
   for (i=0;i<dmf.actors.length;++i) {
     if (dmf.actors.options[i].selected) {
       curr  = dmf.actors.options[i].text;
       switch(k) {
         case 1: omf.actor1_name.value = name_split(curr); omf.actor1_fname.value = fname_split(curr); omf.vis_actor1.click(); break;
         case 2: omf.actor2_name.value = name_split(curr); omf.actor2_fname.value = fname_split(curr); omf.vis_actor2.click(); break;
         case 3: omf.actor3_name.value = name_split(curr); omf.actor3_fname.value = fname_split(curr); omf.vis_actor3.click(); break;
         case 4: omf.actor4_name.value = name_split(curr); omf.actor4_fname.value = fname_split(curr); omf.vis_actor4.click(); break;
         case 5: omf.actor5_name.value = name_split(curr); omf.actor5_fname.value = fname_split(curr); omf.vis_actor5.click(); break;
         default: break;
       }
       ++k;
     }
   }
   omf.fsk.value = dmf.pg.value;
   if ($autoclose) self.close();
  }
//--></SCRIPT>";
   $t->set_var("js",$js);
   $t->parse("movie","movieblock");
   $t->pparse("out","template");
 } else {
 #=================================================[ Nothing to do for us! ]===
   $t->set_var("submit",lang("submit"));
   $t->parse("query","queryblock");
   $t->pparse("out","template");
 }

 include("inc/footer.inc");
?>