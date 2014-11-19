#
# Table structure for table 'tx_cmdsiteconfig_configuration'
#
CREATE TABLE tx_cmdsiteconfig_configuration (
        uid int(11) NOT NULL auto_increment,
        pid int(11) DEFAULT '0' NOT NULL,
        tstamp int(11) DEFAULT '0' NOT NULL,
        crdate int(11) DEFAULT '0' NOT NULL,
        cruser_id int(11) DEFAULT '0' NOT NULL,
        sorting int(10) DEFAULT '0' NOT NULL,
        deleted tinyint(4) DEFAULT '0' NOT NULL,
        hidden tinyint(4) DEFAULT '0' NOT NULL,
	label tinytext,
        sites tinytext,
	confitem tinytext,

        PRIMARY KEY (uid),
        KEY parent (pid),
) ENGINE=InnoDB;

#
# Table structure for table 'tx_cmdsiteconfig_confitem'
#
CREATE TABLE tx_cmdsiteconfig_confitem (
        uid int(11) NOT NULL auto_increment,
        pid int(11) DEFAULT '0' NOT NULL,
        tstamp int(11) DEFAULT '0' NOT NULL,
        crdate int(11) DEFAULT '0' NOT NULL,
        cruser_id int(11) DEFAULT '0' NOT NULL,
        sorting int(10) DEFAULT '0' NOT NULL,
        deleted tinyint(4) DEFAULT '0' NOT NULL,
        hidden tinyint(4) DEFAULT '0' NOT NULL,
        parentid int(11) DEFAULT '0' NOT NULL,
        parenttable tinytext NOT NULL,
        constant int(11) DEFAULT '0' NOT NULL,
        value_text tinytext,
        value_area text,
        value_check tinyint(4) DEFAULT '0' NOT NULL,

        PRIMARY KEY (uid),
        KEY parent (pid),
) ENGINE=InnoDB;

#
# Table structure for table 'tx_cmdsiteconfig_constants'
#
CREATE TABLE tx_cmdsiteconfig_constants (
        uid int(11) NOT NULL auto_increment,
        pid int(11) DEFAULT '0' NOT NULL,
        tstamp int(11) DEFAULT '0' NOT NULL,
        crdate int(11) DEFAULT '0' NOT NULL,
        cruser_id int(11) DEFAULT '0' NOT NULL,
        deleted tinyint(4) DEFAULT '0' NOT NULL,
        hidden tinyint(4) DEFAULT '0' NOT NULL,
	label tinytext,
	constant tinytext,
        consttype varchar(10) DEFAULT '' NOT NULL,

        PRIMARY KEY (uid),
        KEY parent (pid),
) ENGINE=InnoDB;
