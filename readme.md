<h2>Zamix ERP</h2>

<p><b>Linguagem de programação:</b> PHP 7.1</p>
<p><b>Laravel:</b> 5</p>
<p><b>Painel de administração:</b> AdminLTE 2</p>
<p><b>Bibliotecas Utilizadas:</b> Bootstrap 3.4, ChartJS 2.8, DataTables 1.10, FullCalendar 1.4, Font Awesome Free 5.10, Ionicons 2.0</p>

<hr/>

## 1º - Clonar o repositório
```
git clone https://github.com/darlinton2000/zamix_erp
```
## 2º - Cria o arquivo .env para as configurações do projeto
```
cp .env.example .env
```
## 3º - Instala as dependências do projeto
```
composer install
```
## 4º - Gerar a chave para o projeto
```
php artisan key:generate
```
## 5º - Cria as tabelas do banco de dados
```
php artisan migrate
```
## 6º - Populando as tabelas do banco de dados com os dados iniciais
```
php artisan db:seed
```
## 7º - Cria o link simbólico aonde as fotos dos usuários ficam armazenadas
```
php artisan storage:link
```
## 8º - Iniciando a aplicação
```
php artisan serve
```

<hr/>

Tela Inicial

![01 - Página Inicial](https://user-images.githubusercontent.com/46008964/224045952-12ed3040-1672-450a-bb5d-2d7f05a46109.png)

Tela de Login

![02 - Tela de Login](https://user-images.githubusercontent.com/46008964/224046047-8f2e2a8c-e78e-4cd6-ba68-70e8032d3538.png)

Dashboard

![03 - Dashboard](https://user-images.githubusercontent.com/46008964/224576176-d13d2288-3165-466d-8b05-c199465c5c25.png)

