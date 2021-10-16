FROM node:14-stretch
WORKDIR /var/www
COPY . /var/www/
RUN npm install
CMD npm run serve
