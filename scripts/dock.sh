# setting up container
sudo docker stop php-quickstart
sudo docker rm php-quickstart
sudo docker build -t php-quickstart .
sudo docker run -d -p 80:8080 --name php-quickstart php-quickstart

sudo docker exec php-quickstart ls -a

