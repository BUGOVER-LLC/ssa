# Use the node image from official Docker Hub
FROM node:20.19.0-alpine as build-stage
# Copy the working directory in the container
COPY package*.json ./
# Install the project dependencies
RUN yarn install
# Copy the rest of the project files to the container
COPY . .
# Build the Vue.js application to the production mode to dist folder
RUN yarn run build
# Use the lightweight Nginx image from the previous stage for the nginx container
FROM nginx:stable-alpine as production-stage
# Copy the build application from the previous stage to the Nginx container
COPY dist /usr/share/nginx/html
# Copy the nginx configuration file
COPY ./docker/nginx.conf /etc/nginx/conf.d/default.conf
# Expose the port 80
EXPOSE 80
# Start Nginx to serve the application
CMD ["nginx", "-g", "daemon off;"]
