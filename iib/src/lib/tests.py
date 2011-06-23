import unittest
import election
import Zeroconf

class TestZeroconfSingleton(unittest.TestCase):
  def setUp(self):
    self.s = election.ZeroconfSingleton()

  def test_only_one(self):
    s2 = election.ZeroconfSingleton()
    self.assertTrue(self.s is not None)
    self.assertTrue(s2 is not None)
    self.assertEqual(self.s,s2)

  def tearDown(self):
    self.s.close()

if __name__ == '__main__':
  unittest.main()