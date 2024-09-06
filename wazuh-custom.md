# Table of Contents

- [Introduction](#introduction)

- [Wazuh Decoders](#wazuh%20decoders)

- [Wazuh Rules](#wazuh-local-or-custom-rules-example)

- [Python Logging](#python-logging)

## Introduction
### [Wazuh Data Analisis](https://documentation.wazuh.com/current/user-manual/ruleset/index.html)
## Wazuh Regex Syntax

### [Wazuh Regex Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/regex.html)


## Wazuh Decoders

### [Wazuh Decoders Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/decoders.html)

### [Wazuh Creating Decoders](https://wazuh.com/blog/creating-decoders-and-rules-from-scratch/)
### [Wazuh Creating Decoders 2](https://medium.com/@bishesh404/blog-on-wazuh-d3fdfe19abc1)

```bash
sudo nano /var/ossec/etc/decoders/local_decoder.xml
```

Having the following log format:

```
date=2024-07-19 time=12:26:59,488 ERROR Test message srcip=192.168.10.12 port=6754
```

Decoder example
```xml
<!----- Custom Parent Decoder Prematch Set Up ----->
<decoder name="python-custom-parent">
  <prematch>^date=\d+-\d+-\d+ time=\d+:\d+:\d+,\d+</prematch>
</decoder>

<!----- Child Decoder Regex for date and time parameters ----->
<decoder name="python-custom-child">
  <parent>python-custom-parent</parent>
  <regex>^date=(\d+-\d+-\d+) time=(\d+:\d+:\d+,\d+)</regex>
  <order>date, time</order>
</decoder>

<!----- Child Decoder Regex for source IP parameter ----->
<decoder name="python-custom-child">
  <parent>python-custom-parent</parent>
  <regex>srcip=(\d+.\d+.\d+.\d+)</regex>
  <order>srcip</order>
</decoder>

<!----- Child Decoder Regex for port parameter ----->
<decoder name="python-custom-child">
  <parent>python-custom-parent</parent>
  <regex>port=(\d+)</regex>
  <order>port</order>
</decoder>

```

```xml
<decoder name="test-example">

  <prematch>[\d+-\d+-\d+ \d+:\d+:\d+] local.INFO: Successful login</prematch>

</decoder>



<!-- User ID, Name Decoder Child -->

<decoder name="child-example">

  <parent>test-example</parent>

  <regex>"user_id":(\d+),"name":"(\w+)"</regex>

  <order>user-id, name</order>

</decoder>



<!-- User Email Decoder Child -->

<decoder name="child-example">

  <parent>test-example</parent>

  <regex>"email":"(\w+@\w+.\w+)"</regex>

  <order>email</order>

</decoder>



<!-- User IP Decoder Child -->

<decoder name="child-example">

  <parent>test-example</parent>

  <regex>"ip":"(\d+.\d+.\d+.\d+)"</regex>

  <order>ip</order>

</decoder>
```

## Wazuh local or custom rules (example)

### [Wazuh Rules Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/rules.html) 

```bash
sudo nano /var/ossec/etc/rules/local_rules.xml
```

```xml
<group name="ossec">
  <rule id="90001" level="15">
    <decoded_as>python-custom-parent</decoded_as>
    <description>Python test log</description>
  </rule>
</group>
```


```bash
sudo nano /var/ossec/etc/rules/custom_rules.xml
```

## Wazuh config file

```bash
sudo nano /var/ossec/etc/ossec.conf
```

```xml
  <localfile>
    <log_format>syslog</log_format>
    <location>/home/bryan/test-envs/networking-env/test-logs.log</location>
  </localfile>
```

## Wazuh test decoder

```bash
sudo  /var/ossec/bin/wazuh-logtest
```
![image](https://github.com/user-attachments/assets/19bd9931-d0d3-477c-96a7-b6dc37274780)



## Python Logging

### [Logging Singleton Pattern](https://towardsdev.com/implementing-the-singleton-pattern-in-python-1a407af9e791)

Logging usage example

```python
import logging

logging.basicConfig(filename = "test-logs.log", level = logging.DEBUG, format = "%(asctime)s %(levelname)s %(threadName)-10s %(message)s",)

test_message = "Test message"

logging.debug(test_message)
```

