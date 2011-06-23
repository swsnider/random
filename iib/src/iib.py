#!/usr/bin/env python2.6

from lib import election

def main():
  election.find_or_elect_master('iib')
  election.ZeroconfSingleton().close()

if __name__ == '__main__': main()