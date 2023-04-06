# 1- CodeIgniter 4 API Rest

It is a simple php application provided as Rest API. It can be used with docker.

# 2 - Tech

Uses a number of open source projects to work properly:

- `CodeIgniter` - v4
- `mysql`
- `php` - v8.x

# 3 - Development

You can use docker to start your new instance. You need to create a image local to run a aplication based on `Dockerfile`.

```sh
docker build -t pedrotti/php-ci .
```
That tag is already setted on `docker-compose.yml`.

Start a new instance at root project:

```sh
docker-compose up -d
```

Charge a new instance of database.

```sh
docker exec cig-api php migrate
```

Watch logs from php server:

```sh
docker logs --follow cig-api
```
# 4 - Deploy

That has not been implemented yet. maybe it will be with apache.

# 5 - References

- [CodeIgniter4](https://codeigniter.com/)
- [PHP 8](http://php.net/) - A popular general-purpose scripting language