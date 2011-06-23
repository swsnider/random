import bottle
import users

@bottle.route('/game/getversion.jsp')
def getversion():
  user = str(bottle.request.GET.get('user'))
  password = str(bottle.request.GET.get('password'))
  version = int(bottle.request.GET.get('version'))
  if version < 12:
    return 'Old Version'
  realpwd = users.users[user]
  if realpwd == password:
    return "1291385898000:asdf:%s:-1" % (users.users.original(user))

if __name__ == "__main__":
  bottle.run(server=bottle.TornadoServer, host=0.0.0.0, port=9090)