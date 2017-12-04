#!/usr/bin/env bash
set -o allexport
source ./.env
set +o allexport

# Create mysql volume target dir if not exists already, and set it as current user (needed for container mapping)
mkdir -p ${MYSQL_HOST_VOLUME_PATH}
sudo chown -R ${HOST_USER}:${HOST_USER} ${MYSQL_HOST_VOLUME_PATH}
sudo chmod -R 775 ${MYSQL_HOST_VOLUME_PATH}

# Create target dir if not exists already, and set it as current user (needed for container mapping)
mkdir -p ${SYMFONY_HOST_RELATIVE_APP_PATH}
sudo chown -R ${HOST_USER}:${HOST_USER} ${SYMFONY_HOST_RELATIVE_APP_PATH}
sudo chmod -R 775 ${SYMFONY_HOST_RELATIVE_APP_PATH}

# Symfony
if ! hash symfony 2>/dev/null; then
    echo "symfony not found. Install..."
    sudo mkdir -p /usr/local/bin
    sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
    sudo chmod a+x /usr/local/bin/symfony
fi
symfony new ${SYMFONY_HOST_RELATIVE_APP_PATH} 3.4

# Copy .env file to Symfony install, to be able to use it in Symfony (3.2+)
cp ./.env ${SYMFONY_HOST_RELATIVE_APP_PATH}/

# Replace parameters.yml.dist to correctly link with database, with env var substitution. This solution is prefered here to env var used in Symfony directly (https://symfony.com/blog/new-in-symfony-3-2-runtime-environment-variables) for backward compatibility
envsubst < ./parameters.yml.dist > ${SYMFONY_HOST_RELATIVE_APP_PATH}/app/config/parameters.yml.dist


if ! hash docker-compose 2>/dev/null; then
    echo "docker-compose not found. Install..."
    sudo curl -L https://github.com/docker/compose/releases/download/1.17.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
fi

docker-compose up -d --build


# Remove initial parameters.yml file to force new generation
docker-compose exec php rm /var/www/html/app/config/parameters.yml

# Run composer update
docker-compose exec -u www-data php composer update --no-interaction
#docker-compose exec -u www-data php sh -c "echo 'alias sf3=\"php bin/console\"' >> ~/.bashrc"