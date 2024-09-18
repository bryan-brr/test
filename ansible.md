# Table of Contents
- [Ansible Learning Sources](#ansible-learning-sources)
- [Installing guide for Ubuntu 22.04](#installing-guide-for-ubuntu-2204)
  - [Checking Dependencies](#checking-dependencies)
  - [Install OpenSSH Client and Server](#install-openssh-client-and-server)
  - [Install Ansible Via Bash Script](#install-ansible-via-bash-script)
- [Ansible Config](#ansible-config)
  - [Ansible Folder Structure](#ansible-folder-structure)
  - [Ansible Config File](#ansible-config-file)
  - [Ansible Test Inventory Nodes](#ansible-test-inventory-nodes)
  - [Ansible Ad-Hoc Commands](#ansible-ad-hoc-commands)
- [Ansible Playbooks](#ansible-playbooks)
  - [Basic Playbook](#basic-playbook)
  - [Apache Service Playbooks](#apache-service-playbooks)
    - [Apache Service Installer Playbook](#apache-service-installer-playbook)
    - [Apache Service Uninstaller Playbook](#apache-service-uninstaller-playbook)
  - [Start Playbooks](#start-playbooks) 


## Ansible Learning Sources

- [Ansible Beginners Guide](https://4sysops.com/archives/ansible-beginner-tutorial/)

- [Ansible Docker Set-Up](https://www.digitalocean.com/community/tutorials/how-to-use-ansible-to-install-and-set-up-docker-on-ubuntu-20-04)

- [Learn Ansible](https://learnansible.dev/article/Getting_Started_with_Ansible_A_Beginners_Guide.html)

- [Ansible Tutorial](https://www.guru99.com/ansible-tutorial.html)

- [Ansible Community Collections](https://docs.ansible.com/ansible/latest/collections/index.html)

- [Ansible Ad-Hoc Commands](https://www.golinuxcloud.com/ansible-ad-hoc-commands/)


## Installing guide for Ubuntu 22.04

[Ansible Official Docs](https://docs.ansible.com/ansible/latest/installation_guide/installation_distros.html#installing-ansible-on-ubuntu)

### Checking Dependencies

Before installing ansible, check the required dependencies:

```bash
# Check if required dependencies are installed
dpkg -s wget gpg | grep -i "^version" &&
```

### Install OpenSSH Client and Server

Ansible will stablish SSH connections with the managed nodes/servers, to do so we'll install OpenSSH packages and generate a pair of keys: 

**Install OpenSSH Packages**

```bash
sudo apt-get install openssh-client openssh-server
```

**Check Installed Dependencies**

```bash
dpkg -s openssh-client openssh-server | grep -i "^version"
```

**Generate Keys**

```bash
ss-keygen -t rsa -b 2048

# passkey: passkey

# /home/user/.ssh/id_rsa  PRIVATE KEY

# /home/user/.ssh/id_rsa.pub PUBLIC KEY
```

**Copy public key into node**

Managed Nodes will be required with the generated public key

```bash
ssh-copy-id [user]@[MANAGED-NODE-IP]
```

### Install Ansible Via Bash Script

**Create a new file for installing ansible**

```bash
vim ansible-installer.sh
```

**Inside this new file add the following instructions**

```bash
UBUNTU_CODENAME=jammy
wget -O- "https://keyserver.ubuntu.com/pks/lookup?fingerprint=on&op=get&search=0x6125E2A8C77F2818FB7BD15B93C4A3FD7BB9C367" | sudo gpg --dearmour -o /usr/share/keyrings/ansible-archive-keyring.gpg
echo "deb [signed-by=/usr/share/keyrings/ansible-archive-keyring.gpg] http://ppa.launchpad.net/ansible/ansible/ubuntu $UBUNTU_CODENAME main" | sudo tee /etc/apt/sources.list.d/ansible.list
sudo apt update && sudo apt install ansible
```

**Give Execution Privileges to the `ansible-installer file`**

```bash
chmod +x ansible-installer.sh
./ansible-installer.sh
```

## Ansible Config

### Ansible Folder Structure

```bash
sudo vim /etc/ansible/test-inventory # This file will be used for testing local nodes
```

```bash
tree /etc/ansible
/etc/ansible/
├── ansible.cfg
├── hosts
├── roles
└── test-inventory # Created test-inventory file
```

### Ansible Config File

Inside this file we can establish default values

```bash
# /etc/ansible/ansible.cfg

[defaults]
inventory = /etc/ansible/test-inventory  # Ansible Default Inventory File Path
remote_user = user
private_key_file = ~/.ssh/id_rsa # PRIVATE KEY
ansible_python_interpreter = /usr/bin/python3
```

### Ansible Test Inventory Nodes

The following Nodes will be managed by ansible via SSH connections using the previous default values (user@192.168.1.5, user@192.168.1.5)

```bash
# /etc/ansible/test-inventory

[node1]
192.168.1.5

[node2]
192.168.1.10
```

### Ansible Ad-Hoc Commands

**Syntax**

```bash
ansible [remote_nodes] -m [module_name] -a "[module_commands]"
```

**Check Connectivity**

```bash
ansible all -m ping
```

```bash
192.168.1.5 | SUCCESS => {

    "ansible_facts": {

        "discovered_interpreter_python": "/usr/bin/python3"

    },

    "changed": false,

    "ping": "pong"

}
192.168.1.10 | SUCCESS => {

    "ansible_facts": {

        "discovered_interpreter_python": "/usr/bin/python3"

    },

    "changed": false,

    "ping": "pong"

}
```
**Free Node1's memory**

```bash
ansible node1 -m shell -a "free -m"
```

**Check disk space**

```bash
ansible all -m shell -a "df -h"
```


## Ansible Playbooks

### Basic Playbook

```bash
sudo vim /etc/ansible/test-playbook.yml
```

```yml
---
- name: Hello Message
  hosts: [node1, node2]
  tasks:
    - name: Print message
      debug:
        msg: Hello Ansible World
```

```bash
ansible-playbook /etc/ansible/test-playbook.yml
```

### Apache Service Playbooks

Having this folder structure

```bash
/etc/ansible/
├── ansible.cfg
├── apache-playbooks
│   ├── apache-install-playbook.yml # Install and Start Apache Service
│   └── apache-remove-playbook.yml  # Remove and Purge Apache Service
├── hosts
├── roles
├── test-inventory
└── test-playbook.yml
```


#### Apache Service Installer Playbook

```yml
# /etc/ansible/apache-playbooks/apache-install-playbook.yml
---
- name: Install Apache
  hosts: node1
  become: true
  tasks:
    - name: Install Apache
      apt:
        name: apache2
        state: latest
    - name: Start Apache
      service:
        name: apache2
        state: started

```

#### Apache Service Uninstaller Playbook

```yml
# /etc/ansible/apache-playbooks/apache-remove-playbook.yml
---
- name: Uninstall Apache
  hosts: node1
  become: true
  tasks:
    - name: Uninstall Apache Service
      ansible.builtin.package:
        name: apache2
        state: absent
        autoremove: yes
        purge: true
```

#### Start Playbooks

**Install Apache**

`--ask-become-pass` parameter will ask for user's password in order escalate privileges

```bash
ansible-playbook /etc/ansible/apache-playbooks/apache-install-playbook.yml --ask-become-pass
```


**Remove Apache**

```bash
ansible-playbook /etc/ansible/apache-playbooks/apache-remove-playbook.yml --ask-become-pass
```
