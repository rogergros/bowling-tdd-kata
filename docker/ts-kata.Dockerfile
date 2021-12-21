FROM node:16-alpine

RUN apk add --no-cache git bash

RUN mkdir /app
WORKDIR /app

RUN yarn