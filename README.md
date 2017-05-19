# Basic MVC application for training

## Introduction

This application can be tested with docker, or by using cli command 
    

## Installation using docker-compose

```bash
$ docker-compose up -d --build
```

At this point, you can visit http://localhost:8080 to see the site running.


## Current Feature

### Cli command

- You can use php public/www/index.php hello-world --name=Christophe should return "Hello Christophe"
- You can ommit parameter '--name', it will return "Hello Unknown"

### Entities

- 2 Entities are created : Library and Book, Obviously, there is a many to many relation between Book and Library 