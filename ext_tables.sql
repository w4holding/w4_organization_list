CREATE TABLE tx_w4organizationlist_domain_model_organization (
	title varchar(255) NOT NULL DEFAULT '',
	description text,
	link varchar(255) NOT NULL DEFAULT '',
	email varchar(255) NOT NULL DEFAULT '',
	name varchar(255) NOT NULL DEFAULT '',
	street varchar(255) NOT NULL DEFAULT '',
	zip varchar(255) NOT NULL DEFAULT '',
	city varchar(255) NOT NULL DEFAULT '',
	tx_w4organizationlist_function varchar(255) NOT NULL DEFAULT '',
	mobile varchar(255) NOT NULL DEFAULT '',
	phone varchar(255) NOT NULL DEFAULT '',
	checkbox_delete varchar(255) NOT NULL DEFAULT '',
	images int(11) unsigned NOT NULL DEFAULT '0',
	fe_cruser int(11) unsigned DEFAULT '0',
	categories int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_w4organizationlist_domain_model_organization (
	categories int(11) unsigned DEFAULT '0' NOT NULL
);
