#Uninstall all about docker containers and volumes.
docker rm $(docker ps -a -q -f name=pedro)
docker rmi $(docker images -q)
rm -rf .docker
