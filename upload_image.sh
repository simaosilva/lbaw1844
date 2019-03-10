#!/bin/bash

# Stop execution if a step fails
set -e

DOCKER_USERNAME=mrzephyr17 # Replace by your docker hub username
IMAGE_NAME=lbaw1844-piu

docker build -t $DOCKER_USERNAME/$IMAGE_NAME .
docker push $DOCKER_USERNAME/$IMAGE_NAME
