- [Basic Git Commands](#basic-git-commands)
- [Basic Docker Commands](#basic-docker-commands)


## Basic Git Commands

```bash
sudo apt install git
```

### Config Variables

**[Git First Set-Up](https://git-scm.com/book/es/v2/Inicio---Sobre-el-Control-de-Versiones-Configurando-Git-por-primera-vez)**

```bash
mkdir git-test
cd git-test/

git init

git config --global user.name "User Test"
git config --global user.email user@test.com

git config --list
```

### [Git Branch Management](https://www.hostinger.es/tutoriales/como-usar-git-branch)
### [Add a Remote Repository URL](https://www.atlassian.com/es/git/tutorials/syncing)

```bash
# Creates a new branch called branch-name if it doesn't exist
git checkout branch-name # git checkout Test-Project

cd git-test/
git add . # Includes everything from the current root directory
git add /file-path # Includes a specified file path from the current root directory

git add remote origin URL # add a remote route called "origin"

# Once the selected folders have been added, use commit command to confirm changes
git commit -m "Descriptive Test Comment"

```

### [User Access Token](https://desarrolloweb.com/articulos/autenticar-github-personal-access-token)

### Push Local Changes into Remote Repository

```bash
# Push local changes into a remote repositor
git push -u origin branch-name 
```

## Basic Docker Commands

### Install Docker Engine

**[Docker Engine Official Docs](https://docs.docker.com/engine/install/ubuntu/)**

Create a bash script for installing Docker Engine

```bash
nano docker-installer.sh
```

Inside the docker-installer file add the following content:

```bash
#!/bin/bash

# Run the following command to uninstall all conflicting packages:
for pkg in docker.io docker-doc docker-compose docker-compose-v2 podman-docker containerd runc; do sudo apt-get remove $pkg; done

# Set up Docker's apt repository.

# Add Docker's official GPG key:
sudo apt-get update
sudo apt-get install ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc

# Add the repository to Apt sources:
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update

# To install the latest version, run:
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

**Assign execution permission**

```bash
chmod +x docker-installer.sh
./docker-installer.sh
```

**Few Docker Commands**
```bash
docker --version

#List all docker containers (active and inactive)
sudo docker ps -a

#List all docker containers' ID (active and inactive)
sudo docker ps -aq

#List all docker images
sudo docker images -a

#List all docker images' ID 
sudo docker images -aq

#Remove a specific image using ID
sudo docker image rm image-id

#Remove all images
sudo docker image rm $(sudo docker images -aq)

#Stop and remove a specific container
sudo docker rm -fv

#Stop and remove all containers
sudo docker rm $(sudo docker ps -aq)
```


