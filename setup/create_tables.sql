# ========================================================
# Database for phpVideoPro
# ========================================================

# --------------------------------------------------------
#
# Table structure for table 'actors'
#

CREATE TABLE actors (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   firstname varchar(30),
   PRIMARY KEY (id)
);


# --------------------------------------------------------
#
# Table structure for table 'cass'
#

CREATE TABLE cass (
   id int(4) NOT NULL auto_increment,
   type int(3),
   free int(3),
   PRIMARY KEY (id)
);


# --------------------------------------------------------
#
# Table structure for table 'cat'
#

CREATE TABLE cat (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   PRIMARY KEY (id),
   UNIQUE name (name)
);


# --------------------------------------------------------
#
# Table structure for table 'colors'
#

CREATE TABLE colors (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   sname varchar(5),
   PRIMARY KEY (id),
   UNIQUE sname (sname)
);


# --------------------------------------------------------
#
# Table structure for table 'directors'
#

CREATE TABLE directors (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   firstname varchar(30),
   PRIMARY KEY (id)
);


# --------------------------------------------------------
#
# Table structure for table 'mtypes'
#

CREATE TABLE mtypes (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   sname varchar(5),
   PRIMARY KEY (id),
   UNIQUE sname (sname)
);


# --------------------------------------------------------
#
# Table structure for table 'music'
#

CREATE TABLE music (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   firstname varchar(30),
   PRIMARY KEY (id)
);


# --------------------------------------------------------
#
# Table structure for table 'pict'
#

CREATE TABLE pict (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   sname varchar(5),
   PRIMARY KEY (id),
   UNIQUE sname (sname)
);


# --------------------------------------------------------
#
# Table structure for table 'tone'
#

CREATE TABLE tone (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   sname varchar(5),
   PRIMARY KEY (id),
   UNIQUE sname (sname)
);


# --------------------------------------------------------
#
# Table structure for table 'video'
#

CREATE TABLE video (
   id int(7) NOT NULL auto_increment,
   mtype_id int(5),
   cass_id int(4),
   part int(2),
   title varchar(60),
   length int(3),
   aq_date date,
   source varchar(15),
   director_id int(5),
   director_list int(1),
   music_id int(5),
   music_list int(1),
   country varchar(30),
   year int(4),
   cat1_id int(5),
   cat2_id int(5),
   cat3_id int(5),
   actor1_id int(5),
   actor2_id int(5),
   actor3_id int(5),
   actor4_id int(5),
   actor5_id int(5),
   actor1_list int(1),
   actor2_list int(1),
   actor3_list int(1),
   actor4_list int(1),
   actor5_list int(1),
   tone_id int(5),
   color_id int(5),
   pict_id int(5),
   lp int(1),
   fsk int(2),
   comment text,
   PRIMARY KEY (id)
);


# --------------------------------------------------------
#
# Table structure for table 'preferences'
#

CREATE TABLE preferences (
   id int(5) NOT NULL auto_increment,
   name varchar(30),
   value varchar(30),
   PRIMARY KEY (id)
);
