
# Guia de Instalação com Docker

#### Passo 1: 
Criar diretório para armazenamento dos dados do MySQL no Host, caso seja utilizado um diretório diferente do que o sugerido, o novo caminho deve ser alterado no arquivo docker-compose.yml
```
mkdir /home/apps
mkdir /home/apps/borgert
mkdir /home/apps/borgert/mysql
```

#### Passo 2:
Instalação dos plugins do bower
> sudo docker-compose exec php-fpm bower install --allow-root

#### Passo 3:
Instalamos os pacotes do packagist utilizando o composer.
> sudo docker-compose exec php-fpm composer install

#### Passo 4:
Configure ou crie o arquivo `.env` com suas configurações de banco de dados, o arquivo `.env.example` pode ser usado como exemplo. Usar mesmas credenciais utilizadas na criação do container do MySQL, as credenciais podem ser alteradas no arquivo docker-compose.yml

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=borgertdb
DB_USERNAME=borgertuser
DB_PASSWORD=borgertpasswd
```

#### Passo 5:
Gerar a chave da aplicação
> sudo docker-compose exec php-fpm php artisan key:generate

#### Passo 6:
Criação da estrutura do banco de dados
> sudo docker-compose exec php-fpm php artisan migrate

#### Passo 7:
Criação do usuário administrador
> sudo docker-compose exec php-fpm php artisan borgert:user 

#### Passo 8:
Subindo todos os containers
> sudo docker-compose up -d

#### Passo 9:
Acessar <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>



------------------------

#### Quer participar?
- Fazendo um pull request ou criando uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).

#### Algum problema na instalação?
Reporte com uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).


