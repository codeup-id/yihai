@echo off

rem -------------------------------------------------------------
rem  Yihai command line bootstrap script for Windows
rem -------------------------------------------------------------

@setlocal

set YIHAI_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%YIHAI_PATH%yihai" %*

@endlocal
