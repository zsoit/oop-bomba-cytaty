run:
	php -S localhost:8080
build:
	rm -rf dist/;
	mkdir -p dist/src dist/database;
	cp -r src/ dist/
	cp -r database/ dist/
	cp -r .htaccess dist/.htaccess
	cp -r *.php dist/
sftp:
	winscp.com -script=ftp.txt