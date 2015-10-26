@echo off
set bundle=AppBundle

echo.
echo Droping/Creating database and tables...
php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force

echo Paso 1 - Limpiando cache de doctrine...
php app/console doctrine:cache:clear-result
IF ERRORLEVEL 1 GOTO ERROR

echo.
echo Paso 2 - Reconstruyendo modelo...
echo php app/console doctrine:generate:entities %bundle%
php app/console doctrine:generate:entities %bundle% >> nul
IF ERRORLEVEL 1 GOTO ERROR

echo.
echo Cargando Fixtures
php app/console doctrine:fixtures:load -n
IF ERRORLEVEL 1 GOTO ERROR


echo.
echo Paso 3 - Limpiando cache en Prod y Dev
echo php app/console cache:clear --env=prod
php app/console cache:clear --env=prod >> nul
echo php app/console cache:clear --env=dev
php app/console cache:clear --env=dev >> nul
IF ERRORLEVEL 1 GOTO ERROR

echo.
echo ---
echo Proceso terminado correctamente!
echo. 
goto End 

:ERROR
echo.
echo ---
echo Proceso fallido!
echo. 
goto End 


:End
@echo on