<?php

class Constants {
	const DEBUG = false;
	const TRACE_LEVEL = 5;
	const APP_NAME = 'Wizard Diary';
	const DATABASE_HOST = 'localhost';
	const DATABASE_NAME = 'diary';
	const DATABASE_USER = 'root';
	const DATABASE_PASSWORD = '';
	const DATABASE_TABLE_PREFIX = 'diary_';
	const DEFAULT_PASSWORD = 'admin';
	const RECAPTCHA_PUBLIC_KEY = '6Ldu-OgSAAAAAH2aZxu-NBcr0CIwwkYdK_GJ52rv';
	const RECAPTCHA_PRIVATE_KEY = '6Ldu-OgSAAAAAEVoUmDuwQmUAwG1qx_g59sp8IrU';
	const COPYRIGHT_START_YEAR = 2014;
	const DAYS_IN_MY_YEAR = 300;
	const POINTS_ON_PAGE_DEFAULT = 24;
	// relatively at /protected/controllers
	const BACKUPS_RELATIVE_PATH = '/../../backups';
	const BACKUPS_CREATE_DURATION_ACCURACY = 2;
	const BACKUPS_CREATE_SOFT_LIMIT = 0.75;
	const BACKUPS_CREATE_HARD_LIMIT = 0.9;
	const BACKUPS_SIZE_ACCURACY = 2;
}
