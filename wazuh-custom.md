# Table of Contents

- [Introduction](#introduction)

- [Wazuh Regex Syntax](#chapter-1)

- [Wazuh Decoders](#chapter-2)

- [Wazuh Rules](#chapter-3)

## Wazuh Regex Syntax

### [Wazuh Regex Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/regex.html)


## Wazuh Decoders

### [Wazuh Decoders Documentation](https://documentation.wazuh.com/current/user-manual/ruleset/ruleset-xml-syntax/decoders.html)

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
