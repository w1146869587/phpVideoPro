# =========================================================
# Updating Database for phpVideoPro from v0.3.5/6 to v0.3.7
# =========================================================

# moved items from config.inc to DB
INSERT INTO pvp_config (name,value) VALUES ('rw_media','1');
INSERT INTO pvp_config (name,value) VALUES ('remove_empty_media','1');
INSERT INTO pvp_config (name,value) VALUES ('site','');
INSERT INTO preferences (name,value) VALUES ('default_movie_colorid','2');

# should title appear on labels
ALTER TABLE video ADD label INT( 1 ) DEFAULT '1' NOT NULL AFTER title;
#ALTER TABLE video ADD label INT DEFAULT '1' NOT NULL;
UPDATE video SET label='1';

# version update
UPDATE pvp_config SET value='0.3.6' WHERE name='version';

# prepare default language update
DELETE FROM lang WHERE lang='en';
