# Module to handle electing masters via PAXOS

import Zeroconf
import socket
import threading

class ZeroconfSingleton(object):
  _instance = None
  def __new__(cls):
    if cls._instance is None:
      cls._instance = super(ZeroconfSingleton, cls).__new__(cls)
    return cls._instance

  def __init__(self):
    self.server = Zeroconf.Zeroconf()
    self.ip = socket.gethostbyname(socket.gethostname())
    self.ip = socket.inet_aton(self.ip)

  def close(self):
    self.server.close()
    ZeroconfSingleton._instance = None

