# Microservicio de PGS

## Comenzando

### Pre-requisitos

- **Docker 20** o superior ([Docker Engine](https://docs.docker.com/engine/install/))
- **Docker Compose 2.5** o superior (Desde Docker 20 está incorporado `docker compose`)

```shell
user@linux:~$ docker -v
Docker version 20.10.15, build fd82621
user@linux:~$ docker compose version
Docker Compose version v2.5.0
```



### Instalación

#### Configuraciones iniciales de Docker
1. Editar el archivo `/etc/docker/daemon.json`.
    
    ```shell
    user@linux:~$ sudo nano /etc/docker/daemon.json
    ```
    
2. Agregar en el nodo `insecure-registries` el valor `10.136.44.42:5000`.
    
    
    ```json
    {
       "insecure-registries" : [
          "10.136.44.42:5000"
       ]
    }
    ```
    
3. Reiniciar los servicios de Docker.
    
    ```shell
    user@linux:~$ sudo systemctl restart docker.socket docker.service
    ```

#### Fork y puesta en marcha

1. Fork de este repositorio asignando el nombre correspondiente al nuevo proyecto.

2. Clonar el nuevo repositorio.
```shell
user@linux:~$ git clone git@git.dlatv.net:PAGOS/microservices/NEWREPOApi.git
```

3. Ingresar al directorio creado.
```shell
user@linux:~$ cd NEWREPOApi
```

4. Ejecutar el comando `make fresh-up` para levantar este microservicio.
```shell
user@linux:~/NEWREPOApi$ make fresh-up
```

5. LISTO!

#### SonarQube

1. Ejecutar el comando `make sonarqube` para actualizar los reportes de SonarQube. La primera vez que se ejecuta se realiza la instalación automaticamente.
```shell
user@linux:~/NEWREPOApi$ make sonarqube
```

2. Se accede a través de la url `http://localhost:9001` con usuario `admin` y contraseña `123123` .

### Comandos make

| Comando              | Descripción                           |
| -------------------- | ------------------------------------- |
| help                 | Print the help                        |
| build                | Build all containers                  |
| up                   | Run all containers                    |
| fresh-up             | Run all containers for the first time |
| down                 | Down all containers                   |
| shell                | Enter shell php container             |
| exec                 | Run a command php container           |
| redis                | Enter redis-cli                       |
| rediskeys            | Get all redis keys                    |
| redisflush           | Delete all redis keys                 |
| tests                | Run all test                          |
| testsunit            | Run unit test                         |
| testsintegration     | Run integration test                  |
| sonarqube            | Run SonarQube reports                 |
