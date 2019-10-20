import cookieUniversal from 'cookie-universal'

export default ({ req, res }, inject) => {
  const options = {
  "alias": "cookie",
  "parseJSON": true
}
  inject(options.alias, cookieUniversal(req, res, options.parseJSON))
}
