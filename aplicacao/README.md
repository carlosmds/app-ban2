# Aplicação PHP + MySQL com Laravel e Docker

Comando Docker: `docker-compose up -d`

É um requisito que as portas 80, 3306 não estejam sendo utilizadas. 

Após subir o ambiente estará disponível em: http://localhost/

Talvez seja necessário ajustar as permissões das pastas. Para resolver execute o comando `chmod -R 777 .`

Executar comandos de aplicações (composer,npm,artisan): `docker-compose run --rm {command}`

Exemplos: 
- `docker-compose run --rm composer install`
- `docker-compose run --rm npm run watch`
- `docker-compose run --rm artisan key:generate`

