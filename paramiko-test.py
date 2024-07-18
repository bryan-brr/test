# https://stackabuse.com/creating-a-singleton-in-python/

import paramiko, time
from abc import ABC, abstractmethod
from getpass import getpass

"""
Singleton class must be improved so it can work with the whole script
"""

class TestConnectionBlah(ABC):
  @abstractmethod
  def _setSSHClient(self) -> None:
    pass
    
  @abstractmethod
  def startSSHConnection(self):
    pass
    
  @abstractmethod
  def executeCommand(self, command: str) -> None:
    pass

  @abstractmethod
  def closeSSHConnection(self) -> None:
    pass

class TestConnection(TestConnectionBlah):
  def __init__(self, host: str, username: str):
    self.host = host
    self.username = username
    self.client = None

  def _setSSHClient(self) -> None:
    if self.client is None:
      self.client = paramiko.client.SSHClient()
      self.client.set_missing_host_key_policy(paramiko.AutoAddPolicy())

  def startSSHConnection(self) -> None:
    self._setSSHClient()
    self.client.connect(self.host, username = self.username, password = getpass("Password: "))

  def executeCommand(self, command: str) -> None:
    _stdin, _stdout, _stderr = self.client.exec_command(command)
    print(_stdout.read().decode())

  def closeSSHConnection(self) -> None:
    if self.client:
      self.client.close()
      self.client = None

def main() -> None:
  host = "10.100.10.40"
  username = "bryan"

  c1 = TestConnection(host, username)
  c2 = TestConnection(host, username)

  print(c1 is c2) #False since is not a single instance of the TestConnection Class

  ssh_client = TestConnection(host, username)
  ssh_client.startSSHConnection()
  ssh_client.executeCommand("ls -la")
  ssh_client.closeSSHConnection()

if __name__ == "__main__":
  main()






