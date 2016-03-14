# Teams101x Compatibilities and potential clashes activity

#Usage

> Section 2: Personalities and Role Preferences in Teams > Belbin team role types > Compatibilities and potential clashes: Peers

Learner selects 2 roles, as first and second preference. The learner will then need to identify likely compatibilities and potential conflicts based on their selection

# Installation 

### Files

* config.php

once cloned, create a file called "config.php" and add the following with your details in place of the placeholder values

```php
<?php
	//Configuration File
	//key=>secret
	$config = array(
		'lti_keys'=>array(
			'YOUR_CLIENT_KEY'=>'YOUR_CLIENT_SECRET'
		),
		'use_db'=>true,
		'db'=>array(
			'driver'=>'mysql',
			'hostname'=>'localhost',
			'username'=>'YOUR_DB_USERNAME',
			'password'=>'YOUR_DB_PASSWORD',
			'dbname'=>'YOUR_DB_NAME',
		)
	);
?>
```

### Database
#### MySQL
> Version Ver 14.14 Distrib 5.1.73, for redhat-linux-gnu (x86_64) using readline 5.1

#### Tables

* Responses

```sql

CREATE TABLE `responses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` text,
  `survey_id` text NOT NULL,
  `response` mediumtext,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

```


### LTI Setup
1. Edit config.php with your respective LTI keys and optional database details
2. Host on a https server (LTI with edX requires HTTPS)
3. Add the respective keys in the edX advanced settings
4. Create a new LTI component and point it to the correct URL

### LTI Boilerplate Usage
1. use test.php with LTI to confirm that everything is connecting
2. on each page, include <?php require_once('inc/header.php'); ?> at the top
3. to ensure valid LTI, make sure to run $lti->requirevalid(); directly after header.php

### Testing
For testing we recommend the LTI 1.1 testbed, available at: http://www.imsglobal.org/developers/LTI/test/v1p1/lms.php
