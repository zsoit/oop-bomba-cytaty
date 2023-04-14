run:
	php -S localhost:8080
build:
	rm -rf dist/;
	mkdir -p dist/src dist/database;
	cp -r src/ dist/src/;
	# cp -r index.php dist/index.php;
	cp -r database/base.db dist/database/base.db
	cp -r .htaccess dist/.htaccess
	cp -r *.php dist/
sftp:
	winscp.com -script=sftp.txt