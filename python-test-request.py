import requests, time

from requests import Timeout

from abc import ABC, abstractmethod



class TestRequestBase(ABC):

  @abstractmethod

  def startRequest(self) -> None:

    pass



class TestRequest(TestRequestBase):

  def __init__(self, url: str):

    self.url = url

  def startRequest(self) -> None:

    try:

     self.response = requests.get(self.url)

    except Timeout as e:

      print(e)

  def __str__(self) -> str:

    return f"{self.response}"

class App:

  def __init__(self, requestObject: TestRequest):

    self.requestObject = requestObject

  def start(self) -> None:

    self.requestObject.startRequest()

  def __str__(self) -> str:

    return f"Request response: {self.requestObject}"



def main() -> None:


  #url = "http:/domain-name/test"

  #GET Method

  requestObject = TestRequest(url)

  app = App(requestObject)

  for x in range(0,11):

    app.start()

  print(app)



if __name__ == "__main__":

  start = time.time()

  try:

    main()

  except Exception as e:

    print(f"Error: {e}")

  end = time.time()

  print("Total time: ", end - start)



