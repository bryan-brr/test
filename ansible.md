# Table of Contents

- [Introduction](#introduction)

- [Installing guide for Ubuntu 22.04](#chapter-1)

- [Ansible Guide](#section-1-1)

- [Ansible Ad Hoc Commands](#section-1-2)

- [More](#chapter-2)


## Installing guide for Ubuntu 22.04

https://docs.ansible.com/ansible/latest/installation_guide/installation_distros.html#installing-ansible-on-ubuntu

```bash
sudo apt update && sudo apt upgrade
sudo apt install software-properties-common
sudo add-apt-repository --yes --update ppa:ansible/ansible
sudo apt install ansible

ansible --version
```

```bash
nano /etc/ansible/ansible.cfg

[defaults]
inventory = /etc/ansible/hosts
remote_user = [Name]
private_key_file = ~/.ssh/id_rsa
ansible_python_interpreter = /usr/bin/python3
```


### Ansible Guide:

https://docs.paramiko.org/en/latest/api/channel.html

### Ansible Ad Hoc Commands:

https://www.golinuxcloud.com/ansible-ad-hoc-commands/





