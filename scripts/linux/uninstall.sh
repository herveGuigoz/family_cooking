#Uninstall all about docker containers and volumes.
docker rm $(docker ps -a -q -f name=familly_cooking)
docker rmi $(docker images -q)
rm -rf .docker
