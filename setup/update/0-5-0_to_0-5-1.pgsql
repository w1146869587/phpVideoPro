# =======================================================
# Updating Database for phpVideoPro from v0.5.0 to v0.5.1
# =======================================================

# New table structs
CREATE TABLE disks (
  id SERIAL,
  mtype_id INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  size VARCHAR(20),
  lp INT NOT NULL DEFAULT 0,
  rc INT NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);
INSERT INTO disks (mtype_id,name) VALUES (3,'VCD');
INSERT INTO disks (mtype_id,name) VALUES (3,'SVCD');
INSERT INTO disks (mtype_id,name,size) VALUES (3,'CD-R','650 MB');
INSERT INTO disks (mtype_id,name,size) VALUES (3,'CD-R','720 MB');
INSERT INTO disks (mtype_id,name,size) VALUES (3,'CD-RW','650 MB');
INSERT INTO disks (mtype_id,name,size) VALUES (3,'CD-RW','720 MB');
INSERT INTO disks (mtype_id,name,rc) VALUES (4,'DVD-5',1);
INSERT INTO disks (mtype_id,name,rc) VALUES (4,'DVD-9',1);
INSERT INTO disks (mtype_id,name,size,rc) VALUES (4,'DVD-R','4.7 GB',1);
INSERT INTO disks (mtype_id,name,size,rc) VALUES (4,'DVD-RW','4.7 GB',1);
INSERT INTO disks (mtype_id,name,size,rc) VALUES (4,'DVD+R','4.7 GB',1);
INSERT INTO disks (mtype_id,name,size,rc) VALUES (4,'DVD+RW','4.7 GB',1);

ALTER TABLE cass ADD disks_id INT;
ALTER TABLE cass ADD rc VARCHAR;

# prepare default lang update
DELETE FROM lang WHERE lang='en';

# version update
UPDATE pvp_config SET value='0.5.1' WHERE name='version';
