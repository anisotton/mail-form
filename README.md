# Formulário de e-email
Aplicação simples de envio de email com anexo

# Instalação
- Download ou Clone esse repositorio
```
git clone https://github.com/anisotton/netshowme.git
```
- Criar uma nova base de dados
- Copie ou renomeie o arquivo ```.env.example``` para ```.env```.
- Altere as configurações de conexão com a base de dados
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
- Altere as configurações de envio de email. OBS.: Os email serão enviado para o endereço preenchido no configurador MAIL_FROM_ADDRESS 
```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```
-  Execute os seguintes comandos na raiz do projeto:
```
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan serve
```
