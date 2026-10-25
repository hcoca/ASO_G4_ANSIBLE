<?php
/**
 * phpMyAdmin configuration for openSUSE
 * Managed by Ansible
 */

$cfg['blowfish_secret'] = '{{ phpmyadmin_blowfish_secret }}';

$i = 0;
$i++;

/* Authentication type */
$cfg['Servers'][$i]['auth_type'] = 'cookie';

/* Server parameters */
$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['connect_type'] = 'tcp';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;

/* Directories for saving/loading files from server */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

/* Security and UI preferences */
$cfg['CheckConfigurationPermissions'] = false;
$cfg['SendErrorReports'] = 'never';
