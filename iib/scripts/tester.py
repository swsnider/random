#!/usr/bin/env python2.6

import socket

def main():
  s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
  s.connect(('<broadcast>', 9999))
  print "listening..."
  while True:
    data = s.recv(4096)
    print data


if __name__ == '__main__': main()