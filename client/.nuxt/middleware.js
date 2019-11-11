const middleware = {}

middleware['auth'] = require('../middleware/auth.js')
middleware['auth'] = middleware['auth'].default || middleware['auth']

middleware['recipes'] = require('../middleware/recipes.js')
middleware['recipes'] = middleware['recipes'].default || middleware['recipes']

middleware['restricted'] = require('../middleware/restricted.js')
middleware['restricted'] = middleware['restricted'].default || middleware['restricted']

export default middleware
