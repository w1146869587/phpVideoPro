# ========================================================
# English Translation phrases for phpVideoPro
# ========================================================

INSERT INTO lang (message_id,lang,content) VALUES ('not_yet_implemented','en','Sorry - not yet implemented.');
INSERT INTO lang VALUES('medium','en','Medium');
INSERT INTO lang VALUES('nr','en','Nr');
INSERT INTO lang VALUES('title','en','Title');
INSERT INTO lang VALUES('length','en','Length');
INSERT INTO lang VALUES('year','en','Year');
INSERT INTO lang VALUES('date_rec','en','Date Aquired');
INSERT INTO lang VALUES('category','en','Category');
INSERT INTO lang VALUES('medialist','en','Medialist');
INSERT INTO lang VALUES('enter_min_free','en','Enter minimum of free space on medium to display:');
INSERT INTO lang VALUES('display','en','Display');
INSERT INTO lang VALUES('free_space_on_media','en','Following media have at least %1 minutes of free space available:');
INSERT INTO lang VALUES('free','en','Free');
INSERT INTO lang VALUES('content','en','Content');
INSERT INTO lang VALUES('filter_setup','en','Filter Setup');
INSERT INTO lang VALUES('mediatype','en','MediaType');
INSERT INTO lang VALUES('screen','en','Screen Format');
INSERT INTO lang VALUES('picture','en','Color Format');
INSERT INTO lang VALUES('tone','en','Tone Format');
INSERT INTO lang VALUES('longplay','en','LongPlay');
INSERT INTO lang VALUES('fsk','en','PG');
INSERT INTO lang VALUES('actor','en','Actor');
INSERT INTO lang VALUES('director','en','Director');
INSERT INTO lang VALUES('composer','en','Composer');
INSERT INTO lang VALUES('min','en','min');
INSERT INTO lang VALUES('max','en','max');
INSERT INTO lang VALUES('s/w','en','b/w');
INSERT INTO lang VALUES('farbe','en','Color');
INSERT INTO lang VALUES('3d','en','3D');
INSERT INTO lang VALUES('edit_entry','en','Edit entry %1');
INSERT INTO lang VALUES('view_entry','en','View entry %1');
INSERT INTO lang VALUES('add_entry','en','Add entry');
INSERT INTO lang VALUES('unknown','en','unknown');
INSERT INTO lang VALUES('country','en','Country');
INSERT INTO lang VALUES('medianr','en','MediaNr');
INSERT INTO lang VALUES('highest_db_entries','en','highest entries in db');
INSERT INTO lang VALUES('no','en','No');
INSERT INTO lang VALUES('yes','en','Yes');
INSERT INTO lang VALUES('medialength','en','MediaLength');
INSERT INTO lang VALUES('minute_abbrev','en','min');
INSERT INTO lang VALUES('source','en','Source');
INSERT INTO lang VALUES('staff','en','Staff');
INSERT INTO lang VALUES('name','en','Name');
INSERT INTO lang VALUES('first_name','en','First Name');
INSERT INTO lang VALUES('in_list','en','in List');
INSERT INTO lang VALUES('comments','en','Comments');
INSERT INTO lang VALUES('cancel','en','Cancel');
INSERT INTO lang VALUES('create','en','Create');
INSERT INTO lang VALUES('update','en','Update');
INSERT INTO lang VALUES('edit','en','Edit');
INSERT INTO lang VALUES('delete','en','Delete');
INSERT INTO lang VALUES('invalid_media_nr','en','The MediaNr you specified is either incomplete or invalid. You must specify a <b>number</b> in <b>both</b> MediaNr fields.');
INSERT INTO lang VALUES('warning','en','warning');
INSERT INTO lang VALUES('of_aquiration','en','of aquiration');
INSERT INTO lang VALUES('wrong_date','en','The date %1 you specified (%2) is invalid. When entering a date here, please follow the syntax "YYYY-MM-DD", where "YYYY" stands for the year (four-digit), "MM" for the month and "DD" for the day (both two-digit). If you want no date in here, just leave this field blank (or set it to "0000-00-00").');
INSERT INTO lang VALUES('incomplete_date','en','If you do not know the exact date, but - for example - only that you aquired it in the year 2000, substitute zeros for the unknown data - in our example the date should look like "2000-00-00".');
INSERT INTO lang VALUES('dupe_id_entered','en','There is already an entry in the database for the entered media ID. Please hit the "Back" button of your browser and correct your input. Hint: There is a Select-Box next to the input box you specified the media number in. This select box tells you the highest existing movie id. Normally it is a good choice for a new media to increase the first (four-digit) number by one, or for a new movie on the same media, increase the second (two-digit) number by one.');
INSERT INTO lang VALUES('create_success','en','Entry created successfully');
INSERT INTO lang VALUES('update_failed','en','Failed to update entry');



# when finished, activate language
UPDATE languages SET available='Yes' WHERE lang_id='en';
