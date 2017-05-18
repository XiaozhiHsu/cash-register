#install phpunit
```
yum -y install wget
wget https://phar.phpunit.de/phpunit-4.8.phar
chmod +x phpunit-4.8.phar
mv phpunit-4.8.phar /usr/local/bin/phpunit48
```

#run all test
```
cd tests/
phpunit48 --bootstrap bootstrap.php ./
```
