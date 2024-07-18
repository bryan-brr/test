# Table of Contents

- [Introduction](#introduction)

- [Wazuh Regex Syntax](#chapter-1)

- [Wazuh Decoders](#chapter-2)

- [Wazuh Rules](#chapter-3)

- [Python Logging](#chapter-4)

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

```xml

```

## Wazuh local or custom rules

### [Wazuh Rules Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/rules.html) 

```bash
sudo nano /var/ossec/etc/rules/local_rules.xml
```

```bash
sudo nano /var/ossec/etc/rules/custom_rules.xml
```

## Wazuh config file

```bash
sudo nano /var/ossec/etc/ossec.conf
```

## Wazuh test decoder

```bash
sudo  /var/ossec/bin/wazuh-logtest
```
## Python Logging

### [Logging Singleton Pattern](https://towardsdev.com/implementing-the-singleton-pattern-in-python-1a407af9e791)

Logging usage example

```python
import logging

logging.basicConfig(filename = "test-logs.log", level = logging.DEBUG, format = "%(asctime)s %(levelname)s %(threadName)-10s %(message)s",)

test_message = "Test message"

logging.debug(test_message)
```

