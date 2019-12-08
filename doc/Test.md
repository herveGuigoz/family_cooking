## Know issues

`Unable to create a signed JWT from the given configuration`
- Recreate public and private key :

```
docker-compose exec php mkdir -p config/jwt
docker-compose exec php openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
docker-compose exec php openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
```
