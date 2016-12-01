@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../instaclick/php-webdriver/bin/webunit
php "%BIN_TARGET%" %*
