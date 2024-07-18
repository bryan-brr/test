Ansible Guide:

https://docs.paramiko.org/en/latest/api/channel.html

Python Singleton Pattern:

https://stackabuse.com/creating-a-singleton-in-python/

Python for Cybersecurity:

https://github.com/bpbpublications/Python-for-Cybersecurity-Cookbook/tree/main

SAMM (Software Assurance Maturity Model):

https://owaspsamm.org/about/

Wazuh Rules:

https://medium.com/@josephalan17201972/custom-alert-rules-in-wazuh-tryhackme-write-up-613e8e99a6b3

PHP Login Guide:

https://codeshack.io/secure-login-system-php-mysql/

https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

Cyber Defense Courses:

https://www.sans.org/job-roles-roadmap/cyber-defense/

Nginx config file structure:

https://www.digitalocean.com/community/tutorials/understanding-the-nginx-configuration-file-structure-and-configuration-contexts

Budibase

https://budibase.com/

Pentesting Report Guide:

https://www.hackthebox.com/blog/penetration-testing-reports-template-and-guide

https://www.browserstack.com/guide/penetration-testing-report-guide

Penetration Testing Execution Standard:

https://readthedocs.org/projects/pentest-standard/downloads/pdf/latest/

https://cheatsheetseries.owasp.org/cheatsheets/Authentication_Cheat_Sheet.html


OWASP Testing Guide:

https://wiki.owasp.org/images/9/97/OWASP_Testing_Guide_Version_3.pdf

https://wiki.owasp.org/images/d/dd/OWASP6thAppSec_TestingGuidev2_MatteoMeuci.pdf

Wazuh docker:

  https://es.linux-console.net/?p=20658
  
  https://github.com/wazuh/wazuh-docker/tree/master


Docker Compose Syntax:

 https://justreadblog.com/docker-compose-file-structure-and-usage-with-example/

 https://gabrieltanner.org/blog/docker-compose/

 Volúmenes en Docker:

 https://kinsta.com/es/blog/volumenes-docker-compose/

 Docker Compose PHP MyAdmin, NGINX, MySQL:

 https://www.kisphp.com/docker/docker-compose-for-php-nginx-and-mysql

C2 Info:

 https://www.varonis.com/blog/what-is-c2
 

Atomic Red Team Install:

 https://github.com/redcanaryco/invoke-atomicredteam/wiki/Installing-Atomic-Red-Team/f70bafb8afd571ae91a01bc7b974cf2a3a4dc93eç

```ps1
IEX (IWR 'https://raw.githubusercontent.com/redcanaryco/invoke-atomicredteam/master/install-atomicredteam.ps1' -UseBasicParsing);
Install-AtomicRedTeam -getAtomics -Force
```
 

Linux Atomic Tests by ATT&CK Tactic & Technique

 https://github.com/redcanaryco/atomic-red-team/blob/master/atomics/Indexes/Indexes-Markdown/linux-index.md


Powershell installation from PMC, Ubuntu 22.04:

https://learn.microsoft.com/en-us/powershell/scripting/install/install-ubuntu?view=powershell-7.4

```sh
###################################
# Prerequisites

# Update the list of packages
sudo apt-get update

# Install pre-requisite packages.
sudo apt-get install -y wget apt-transport-https software-properties-common

# Get the version of Ubuntu
source /etc/os-release

# Download the Microsoft repository keys
wget -q https://packages.microsoft.com/config/ubuntu/$VERSION_ID/packages-microsoft-prod.deb

# Register the Microsoft repository keys
sudo dpkg -i packages-microsoft-prod.deb

# Delete the Microsoft repository keys file
rm packages-microsoft-prod.deb

# Update the list of packages after we added packages.microsoft.com
sudo apt-get update

###################################
# Install PowerShell
sudo apt-get install -y powershell

# Start PowerShell
pwsh
```
 
