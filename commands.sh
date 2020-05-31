php artisan clear-compiled 
php artisan optimize:clear
composer dump-autoload
php artisan optimize
#&EC@1%Fc34 //clave de registro
#Soportapp&EC@1%Fc34 admin  //clave y usuario de la base de datos 
#Soportapp&EC@1%Fc34  admin@soportapp.tk  //clave y usuario admin Web
CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'password';
ALTER USER 'usuario'@'localhost' IDENTIFIED WITH mysql_native_password BY 'mypassword';
CREATE USER 'usuario'@'localhost ' IDENTIFIED WITH mysql_native_password BY 'your_password';

GRANT select,insert,update,delete ON soportapp.users TO admin@localhost;
GRANT select,insert,update,delete ON soportapp.order_services TO admin@localhost;
GRANT select,insert,update,delete ON soportapp.clients TO admin@localhost;
