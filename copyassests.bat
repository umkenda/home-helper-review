@echo off
echo Copying AdminLTE assets...

xcopy /Y /E node_modules\@fontawesome\ webroot\webroot\plugins\font-awesome\

echo Done!

pause