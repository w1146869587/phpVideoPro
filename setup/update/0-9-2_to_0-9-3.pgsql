# ========================================================
# Updating Database for phpVideoPro from v0.9.2 to v0.9.3
# ========================================================

BEGIN;

# prepare default lang update
#DELETE FROM lang WHERE lang='en';

# IMDB name stuff
ALTER TABLE actors ADD imdb_id VARCHAR(10);
ALTER TABLE directors ADD imdb_id VARCHAR(10);
ALTER TABLE music ADD imdb_id VARCHAR(10);

# version update
#UPDATE pvp_config SET value='0.9.3' WHERE name='version';

COMMIT;