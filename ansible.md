# Table of Contents

- [Introduction](#introduction)

- [Installing guide for Ubuntu 22.04](#chapter-1)

- [Ansible Guide](#section-1-1)

- [Ansible Ad Hoc Commands](#section-1-2)

- [More](#chapter-2)


## Installing guide for Ubuntu 22.04

[Ansible Official Docs](https://docs.ansible.com/ansible/latest/installation_guide/installation_distros.html#installing-ansible-on-ubuntu)

```bash
# Check if required dependencies are installed
dpkg -s wget gpg | grep -i "^version" &&

# Create a new file for installing ansible
vim ansible-installer.sh
```
**Install Ansible Via Bash Script**

```bash
UBUNTU_CODENAME=jammy
wget -O- "https://keyserver.ubuntu.com/pks/lookup?fingerprint=on&op=get&search=0x6125E2A8C77F2818FB7BD15B93C4A3FD7BB9C367" | sudo gpg --dearmour -o /usr/share/keyrings/ansible-archive-keyring.gpg
echo "deb [signed-by=/usr/share/keyrings/ansible-archive-keyring.gpg] http://ppa.launchpad.net/ansible/ansible/ubuntu $UBUNTU_CODENAME main" | sudo tee /etc/apt/sources.list.d/ansible.list
sudo apt update && sudo apt install ansible
```

```bash
chmod +x ansible-installer.sh
./ansible-installer.sh
```


```bash
nano /etc/ansible/ansible.cfg

[defaults]
inventory = /etc/ansible/hosts
remote_user = [Name]
private_key_file = ~/.ssh/id_rsa
ansible_python_interpreter = /usr/bin/python3
```


### Ansible Tutorials:

- [Learn Ansible](https://learnansible.dev/article/Getting_Started_with_Ansible_A_Beginners_Guide.html)
- [Ansible Tutorial](https://www.guru99.com/ansible-tutorial.html)
- [Ansible Community Collections](https://docs.ansible.com/ansible/latest/collections/index.html)

https://docs.paramiko.org/en/latest/api/channel.html

### Ansible Ad Hoc Commands:

https://www.golinuxcloud.com/ansible-ad-hoc-commands/





